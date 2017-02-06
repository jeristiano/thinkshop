<?php
include('../../head.php');
include('../data.php');
$sql = "select * from ts_admin ";
$res = mysql_query($sql);
?>

<head>
    <link rel ='stylesheet' href = 'http://127.0.0.1/thinkshop/css/admin/ad_users.css' type = 'text/css'>
</head>


<div class='win_main'>
    <div class='location'>
        <span><a href="../../admin.php">首页</a>&nbsp;&nbsp;&gt;</span>
        <span>系统设置&nbsp;&nbsp;&gt;</span>
        <span>后台用户管理</span>

    </div>
    <div class='info_main'>
        <div class='ad_frm'>
            <div class='location'><span>后台用户管理</span></div>
            <table  >

                <tr class='ad_tr'>

                    <td class='td1'>用户名</td>
                    <td class='td2'>邮箱</td>
                    <td class='td1'>手机</td>
                    <td class='td2'>用户创建时间</td>
                    <td class='td2'>最后登录时间</td>
                    <td class='td1'>操作</td>
                </tr>
                <?php while ($row = mysql_fetch_assoc($res)) { ?>	

                    <tr>						
                        <td><?php echo $row['aname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['cellphone']; ?></td>
                        <td><?php echo date('Y-m-d H:i:s', $row['ctdate']); ?></td>
                        <td><?php echo date('Y-m-d H:i:s', $row['date']); ?></td>
                        <td>
                            <a href='###' colspan='2' onclick='del(<?php echo $row['aid']; ?>)'>
                                <img src='../../img/admin/ad_del.png' >
                            </a>
                            <a href="./edit_user.php?aid=<?php echo $row['aid']; ?>">
                                <img class ='edit' src='../../img/admin/ad_edit.png'>
                            </a>
                        </td>
                    </tr>

<?php } ?>
            </table>
        </div>

    </div>
</div>
</div><!--2边框-->
<div class='clear'></div>
</div><!--1边框-->

<script>
    var del = function (id) {
        if (confirm('确认删除吗?') == true) {
            location.href = './ad_del.php?aid=' + id;

        }
    }

</script> 

<?php
include('../../foot.php');
?>
		

