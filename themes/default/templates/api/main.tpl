<!-- BEGIN: main --><?xml version="1.0" encoding="utf-8"?>
<data>
<response>
	<Status>{msg}</Status>
</response>
<result>
	<total>{total}</total>
	<pages>{all_page}</pages>
	<pagecur>{page}</pagecur>
	<items>
		<!-- BEGIN: loop --><item>
			<ngaycb>{ROW.pubtime}</ngaycb>
            <ngaylm>{ROW.addtime}</ngaylm>
			<masobn>{ROW.masobn}</masobn>
			<namsinh>{ROW.namsinh}</namsinh>
			<gioitinh>{ROW.gioitinh}</gioitinh>
			<diachidango>{ROW.diachitamtru}</diachidango>
			<phuongxadango>{ROW.phuongxatamtru}</phuongxadango>
            <quanhuyendango>{ROW.quanhuyentamtru}</quanhuyendango>
            <tinhthanhdango>{ROW.tinhthanhtamtru}</tinhthanhdango>
			<tinhthanhghinhan>{ROW.tinhthanh}</tinhthanhghinhan>
			<ngaylaymau>{ROW.ngaylaymau}</ngaylaymau>
			<ngaykqxn>{ROW.ngaykqxn}</ngaykqxn>
			<doituonglaymau>{ROW.doituonglaymau}</doituonglaymau>
			<phanloai>{ROW.phanloai}</phanloai>
			<noiguibaocao>{ROW.noiguibc}</noiguibaocao>
		</item><!-- END: loop -->
	</items>
</result>
</data>
<!-- END: main -->