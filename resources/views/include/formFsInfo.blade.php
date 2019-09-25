<form action="{{route('food_safety.store')}}" method="POST" 
            id="formAddFoodSafety">
    <input type="hidden" id="category_id" name="category_id" 
        value="{{$category_id}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row">

        <input type="hidden" id='food_safety_id' name="food_safety_id" value="0">
        <input type="hidden" id='ward_id' name="ward_id" 
            value="{{Session::get('ward_id')}}">
        
        <table class="table table-bordered">
            <tr>
                <td>Mã số</td>
                <td>
                    <input name="code" type="text"
                        class="form-control" id="code" required>
                </td>
            </tr>
            <tr>
                <td>Tên chủ cơ sở</td>
                <td>
                    <input name="ten_chu_co_so" type="text"
                        class="form-control" id="ten_chu_co_so" required>
                </td>
            </tr>
            <tr>
                <td>Tên cơ sở</td>
                <td>
                    <input name="ten_co_so" type="text" class="form-control" 
                        id="ten_co_so" required>
                </td>
            </tr>
            <tr>
                <td>Trạng thái</td>
                <td>
                    <select name="status" class="form-control" style="width: 200px">
                        <option>Đang hoạt động</option>
                        <option>Tạm nghỉ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nhóm</td>
                <td>
                    <select id='categoryb2_id' name='categoryb2_id' 
                        class="form-control">
                        <option value="0">--</option>
                        @foreach($categories as $value)
                            <option value="{{$value->id}}">
                                {{$value->name}}
                            </option>
                        @endforeach                         
                </select>
                </td>
            </tr>
            <tr>
                <td>Thôn</td>
                <td>
                    <select id='village_id' name="village_id" class="form-control">
                        @foreach($villages as $village)
                            <option value="{{$village->id}}">
                                {{$village->name}}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><input name="phone" type="text" class="form-control" 
                    id="phone"  style="width: 300px"></td>
            </tr>
            <tr>
                <td>Ngày ký cam kết</td>
                <td>
                    <input id="ngay_ky_cam_ket" name='ngay_ky_cam_ket' 
                        type="date" value="" class="form-control" >
                </td>
            </tr>
            <tr>
                <td>Số cấp</td>
                <td>
                    <input name="so_cap" type="text" class="form-control" 
                        id="so_cap">
                </td>
            </tr>
            <tr>
                <td>Ngày khám sức khỏe</td>
                <td>
                    <input id="ngay_kham_suc_khoe" name='ngay_kham_suc_khoe'
                        type="date" value="" class="form-control" >
                </td>
            </tr>
            <tr>
                <td>Ngày tập huấn kiến thức</td>
                <td><input id="certification_date" name="certification_date" type="date" 
                    value="" class="form-control" >
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a class='btn btn-primary' onclick="addOrUpdateFoodSafety()" >Lưu</a>
                </td>
            </tr>
        </table>   
    </div>
</form>
