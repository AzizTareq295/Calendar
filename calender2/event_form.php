<?php

include ("connect.php");

?>

<!DOCTYPE html>

<html>

<head>

</head>
<body>

    <form name="eventform" method="post" action="<?php $_SERVER['PHP_SELF']?>">

        <table width="400px">
            <tr>
                <td width="150px">title</td>
                <td width="250"><input type="text" name="Title"></td>
            </tr>
            <tr>
                <td width="150px">Detiles</td>
                <td width="250px"><textarea name="Detiles"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btnadd" value="Add Event"></td>

            </tr>
        </table>

    </form>

</body>
</html>