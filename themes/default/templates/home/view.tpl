<!-- BEGIN: main -->
<div style="margin: auto; margin-top: 5px">
    <table class="list">
        <tbody style="background: #00F3FF">
        <tr>
            <td width="200">
                Mã bệnh nhân
            </td>
            <td>
                <strong>{DATA.masobn}</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="list">
        <tbody class="second">
        <tr>
            <td width="200">
                1. Họ và tên
            </td>
            <td>
                <strong>{DATA.hovaten}</strong>
            </td>
            <td width="200">
                2. Năm sinh
            </td>
            <td>
                {DATA.namsinh}	
            </td>
        </tr>
        </tbody>
        <tr>
            <td>
                3. Giới tính
            </td>
            <td>
                {DATA.gioitinh}
            </td>
        
            <td>
                4. Số điện thoại bệnh nhân/người thân (nếu có)
            </td>
            <td>
                {DATA.dienthoaibn}
            </td>
        </tr>
        <tbody class="second">
        <tr>
            <td>
                5. Địa chỉ của bệnh nhân
            </td>
            <td colspan="3">
            </td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>
                5.1 Địa chỉ đang ở <strong style="color: red">*</strong>
            </td>
            <td colspan="3">
                {DATA.diachitamtru}
            </td>
        </tr>
        </tbody>
        <tr>
            <td>
            </td>	
            <td>
                {DATA.tinhthanhtamtru}
            </td>
            <td>
                {DATA.quanhuyentamtru}
            </td>
            <td>
                {DATA.phuongxatamtru}
            </td>
        </tr>
        <tr>
            <td>
                5.2 Địa chỉ thường trú
            </td>	
            <td colspan="3">
                {DATA.diachithuongtru}
            </td>	
        </tr>
        <tr>
            <td>
            </td>	
            <td>
                {DATA.tinhthanhthuongtru}
            </td>
            <td>
                {DATA.quanhuyenthuongtru}
            </td>
            <td>
                {DATA.phuongxathuongtru}
            </td>
        </tr>
        <tbody class="second">
        <tr>
            <td>
                6. Ngày lấy mẫu <strong style="color: red">*</strong>
            </td>
            <td>
                {DATA.ngaylaymau}
            </td>
            <td>
                7. Ngày có kết quả xét nghiệm <strong style="color: red">*</strong>
            </td>
            <td>
                {DATA.ngaykqxn}
            </td>
        </tr>
        </tbody>
        <tr>
            <td colspan="2">
                8. Kết quả (đính kèm phiếu trả kết quả xét nghiệm) <strong style="color: red">*</strong>
            </td>
            <td colspan="2">
            	<!-- BEGIN: phieuxn -->
                <a href="{DATA.filepxn}" target="_blank"><i class="fa fa-download"></i> Xem phiếu xét nghiệm</a>
                <!-- END: phieuxn -->
            </td>
        </tr>
        <tr>
            <td colspan="2">
                9. Báo cáo ca bệnh hoặc tóm tắt dịch tễ (đính kèm file) <strong style="color: red">*</strong>
            </td>
            <td colspan="2">
            	<!-- BEGIN: baocaocb -->
                <a href="{DATA.filebc}" target="_blank"><i class="fa fa-download"></i> Xem báo cáo</a>
                <!-- END: baocaocb -->
            </td>
        </tr>
        <tbody class="second">
        <tr>
            <td>
                10. Phân loại ca bệnh <strong style="color: red">*</strong>
            </td>
            <td colspan="3">
                {DATA.phanloai}
            </td>
        </tr>
        </tbody>    
        <tr>
            <td width="200">
                11. Đối tượng lấy mẫu <strong style="color: red">*</strong>
            </td>
            <td>
                {DATA.doituonglaymau}
            </td>
            <td>
                Giá trị CT value
            </td>
            <td>
                {DATA.ctvalue}
            </td>
        </tr>
        <tr>
            <td>
                12. Nơi gửi thông báo <strong style="color: red">*</strong>
            </td>
            <td>
                {DATA.noiguibc}
            </td>
            <td>
                Tỉnh/Thành phố báo cáo ca bệnh  <strong style="color: red">*</strong>
            </td>
            <td>
                {DATA.tinhthanh}
            </td>
        </tr>
        <tr>
            <td>
                13. Email nhận mã số bệnh nhân <strong style="color: red">*</strong>
            </td>
            <td colspan="3">
                {DATA.emailnhanbc}
            </td>
        </tr>
        <tr>
            <td>
                14. Ghi chú
            </td>
            <td colspan="3">
                {DATA.ghichu}
            </td>
        </tr>
    </table>
</div>
<!-- END: main -->