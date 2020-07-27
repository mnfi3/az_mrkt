@extends('admin.dashboard')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-12">
                <h6 class="mb-3">گزارش فروش :</h6>
                <form action="{{route('admin-sales-report-result')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label " for="duration"> از تاریخ :</label>
                        <div class="col-md-4">
                            <input type="text" id="duration"
                                   class="form-control j-date start-day"
                                   name="from_date" value="{{$from_date}}">
                        </div>
                        <label class="col-md-2 col-form-label " for="duration2"> تا تاریخ :</label>
                        <div class="col-md-4">
                            <input type="text" id="duration2"
                                   class="form-control j-date start-day "
                                   name="to_date" value="{{$to_date}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 ">
                            <button style="min-width: 200px" class="py-1 my-2 btn btn-lg btn-success" type="submit"> جستجو
                            </button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="red-divider"></div>
        <div class="row ">
            <div class="col-md-2 ml-auto">
                <button style="" class="py-1 my-2 btn btn-sm btn-success" type="submit"  onclick="excelReport(this)" > دریافت خروجی اکسل<span class="fa fa-file-excel ml-2"></span>
                </button>
            </div>
        </div>
        <h6 class="mt-4">نتایج گزارش : </h6>
        <div class="row mt-4" >
            <h4 class="text-dark" style="font-family: Vazir; ">
            </h4>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped"  id="فروش">
                        <thead>
                        <tr>
                            <th scope="col">ردیف</th>
                            <th scope="col">نام کتاب</th>
                            <th scope="col">تعداد فروش</th>
                            <th scope="col">فروشنده</th>
                            <th scope="col">مبلغ کل</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=0)
                        @foreach($books as $book)
                        <tr>
                            <th>{{++$i}}</th>
                            <td>{{$book->name}} </td>
                            <td>{{$book->count}}</td>

                            @if($book->producer_id == 0)
                            <td>
                                <strong style="color: darkgreen">دانشگاه شهید مدنی آذربایجان</strong>
                            </td>
                            @else
                                <td>
                                    <strong style="color: darkblue">{{$book->producer->name}}</strong>
                                </td>
                            @endif
                            <td>{{number_format($book->sum)}} تومان</td>
                        </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <td></td>
                            <td class="text-black" style="max-width: 160px">

                            </td>
                            <td>
                                <strong style="color: #ff0004">مجموع :</strong>
                            </td>

                            <td>
                                {{number_format($total)}} تومان
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
      window.excelReport = function (elm) {
        var sheetname = " لیست ";
        var tableId = "فروش";
        tableToExcel(tableId, sheetname);
      }
      $(document).on('click', '#exportreptoexcelfile', function (event) {
        //working great with Arabic without filename
        console.log(event)
        var sheetname = $("#chainnames").children(":selected").text();
        tableToExcel('students', sheetname);

      });

      var tableToExcel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,'
          ,
          template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table border="2px"><tr>{table}</table></body></html>'
          , base64 = function (s) {
            return window.btoa(unescape(encodeURIComponent(s)))
          }
          , format = function (s, c) {
            return s.replace(/{(\w+)}/g, function (m, p) {
              return c[p];
            })
          }
        return function (table, name) {
          var tableId = table
          if (!table.nodeType) table = document.getElementById(table)
          var orginalTable = table.innerHTML
          var lastColValid = false
          if ($(table).hasClass('course-payment')) {
            lastColValid = true
          }
          for (var j = 0; j < table.rows.length; j++) {
            if (j == 3) {
              table.rows[j].cells[1].width = 180
              table.rows[j].cells[2].width = 180
              table.rows[j].cells[3].width = 180
              try {
                table.rows[j].cells[4].width = 180
              } catch (err) {
              }
            }
            if (!lastColValid) {
              var lastIndex = $(table.rows[j]).children(":last").index()
              var firstElm = $(table.rows[j]).children(":first")
              if ($(firstElm).attr("type") == "hidden") {
                lastIndex = lastIndex - 1
                table.rows[j].deleteCell(lastIndex)
                table.rows[j].deleteCell(lastIndex - 1)
                table.rows[j].deleteCell(lastIndex - 2)
              } else if (lastIndex >= 5) {
                table.rows[j].deleteCell(lastIndex)
                table.rows[j].deleteCell(lastIndex - 1)
              }
            }
          }
          // table.innerHTML=table.innerHTML.replace('/?????/g','')
          var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
          table.innerHTML = orginalTable
          // window.location.href = uri + base64(format(template, ctx))
          var dt = new Date();
          var day = dt.getDate();
          var month = dt.getMonth() + 1;
          var year = dt.getFullYear();
          var postfix = day + "." + month + "." + year;
          var result = uri + base64(format(template, ctx));
          var a = document.createElement('a');
          a.href = result;
          a.download = name + tableId + ' _ ' + postfix + '.xls';
          a.click();
          return true;
        }
      })()


    </script>
@endsection
