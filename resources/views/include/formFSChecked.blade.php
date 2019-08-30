<span>Lịch sử kiểm tra năm</span>
<select class="form-control" 
    style="width:100px;display:inline-block"
    name="year" id="GLOBAL_YEAR_EDIT" onchange="getHistory()">
        <option>2018</option>
        <option selected>2019</option>
        <option>2020</option>
</select>
<table class="table table-bordered">
    <tr>
        <td>Ngày kiểm tra</td>
        <td>Kết quả <br> kiểm tra</td>
        <td>Nội dung không đạt và hình thức xử phạt <br>(nếu có)</td>
        <td style="width: 160px">Test</td>
        <td></td>
    </tr>
    <tbody id='historyChecked'></tbody>
</table>
<br><br>
<span>Thêm kiểm tra mới</span>
<a style="cursor: pointer;" onclick="addCheckedNew()">
    <i class="fa fa-plus"></i></a>
<div class="row p-3 m-1" style="border:1px solid #ddd;display: none;"
     id="form-checked">
    <form id='formCheckedData'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id='food_safety_id' name="food_safety_id" value="0">
        <input type="hidden" name="year" value="">
        <input type="hidden" name="checked_id" value="0">

        <table class="table table-bordered">
            <tr>
                <td style="width: 120px">Ngày kiểm tra</td>
                <td>
                    <input id="dateChecked" 
                        name="dateChecked" 
                        type="date" value="" class="form-control" />
                </td>
            </tr>
            <tr>
                <td>Kết quả</td>
                <td>
                    <select class="form-control" id="result"
                        name="result">
                        <option>Chưa đạt</option>
                        <option>Đạt</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nội dung chưa đạt</td>
                <td>
                    <input id="note" name="note" type="text" value="" class="form-control" >
                </td>
            </tr>
            <tr>
                <td>Hình thức xử lí</td>
                <td>
                    <input id="penalize" 
                        name="penalize" type="text" value="" 
                        class="form-control" />
                </td>
            </tr>
            <tr>
                <td>Test nhanh
                    <a style="cursor: pointer;" onclick="addTest(1)">
                        <i class="fa fa-plus"></i>
                    </a></td>
                <td>
                    <input type="hidden" name="test">
                    <div id='divTest' class="divTest w-100"></div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><a class='btn btn-primary' onclick="addChecked()" >Thêm</a></td>
            </tr>
        </table>
    </form>
</div>
