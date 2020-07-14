<form name='eventform' method='POST' action="<?php $_SERVER['PHP_SELF'];?>?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year;?>&v=true&add=true">
    <table>
        <tr>
            <td width='100px'>일정</td>
            <td width='400px'><input type='text' name='title'></td>
        </tr>
        <tr>
            <td width='100px'>해야할 일</td>
            <td width='400px'><textarea name='detail'></textarea></td>
        </tr>
        <tr>
            <td colspan='2' align='center'><input type='submit' name='btnadd' value ='추가'></td>
        </tr>
    </table>
</form>

