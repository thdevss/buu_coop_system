<style>
table {
    width: 60%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}
td {
    padding-left: 5px;
    padding-right: 5px;
}
</style>
<center>
    <h2>ประกาศรายชื่อผู้เข้าร่วมอบรมเก็บชั่วโมง<?php echo $training['train_type']['name'];?><br> โครงการ <?php echo $training['title'];?></h2>
    <h3>วันที่ <?php echo thaiDate($training['date']);?></h3>

    <table width="100%">
        <thead>
            <tr>
                <td width="5%">ที่</td>
                <td width="11%">บาร์โค้ด</td>
                <td width="10%">รหัสนิสิต</td>
                <td width="40%">ชื่อ - สกุล</td>
                <td width="40%">ลายมือ</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as $i => $student) { ?>
            <tr>
                <td align="center"><?php echo ++$i;?></td>
                <td align="center"><img src="<?php echo $student['student_barcode'];?>" height="30px" width="80px"></td>
                <td align="left"><?php echo $student['student_id'];?></td>
                <td align="left"><?php echo $student['student_fullname'];?></td>
                <td></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</center>