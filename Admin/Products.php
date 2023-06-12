<?php

require "../Connections/shop.php";
connectDB();

if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
  {
    $theValue = stripslashes($theValue);


    switch ($theType) {
      case "text":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;
      case "long":
      case "int":
        $theValue = ($theValue != "") ? intval($theValue) : "NULL";
        break;
      case "double":
        $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
        break;
      case "date":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;
      case "defined":
        $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
        break;
    }
    return $theValue;
  }
}


$query_Recordset1 = "SELECT CategoryId, CategoryName FROM Category_Master";
$Recordset1 = mysqli_query($conn, $query_Recordset1) or die(mysqli_error($conn));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['CategoryId'])) {
  $colname_Recordset2 = $_GET['CategoryId'];
}

$query_Recordset2 = sprintf("SELECT ItemId, ItemName, `Size`, Image, Price, Discount, Total FROM Item_Master WHERE CategoryId = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysqli_query($conn, $query_Recordset2) or die(mysqli_error($conn));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Online Cloth Shopping</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <style type="text/css">
    <!--
    .style9 {
      font-size: 95%;
      font-weight: bold;
      color: #003300;
      font-family: Verdana, Arial, Helvetica, sans-serif;
    }
    -->
  </style>
  <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  <script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
  <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
  <link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
    <!--
    .style12 {
      color: #FFFFFF;
      font-weight: bold;
    }
    -->
  </style>
</head>

<body>
  <div id="wrapper">

    <?php
    include "Header.php";
    ?>

    <div id="content">
      <h2><span style="color:#003300"> Welcome Administrator </span></h2>
      <table width="100%" height="364" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td bgcolor="#003300">&nbsp;</td>
        </tr>
        <tr>
          <td>
            <form action="InsertProduct.php?CategoryId=<?php echo $_GET['CategoryId']; ?>" method="post"
              enctype="multipart/form-data" name="form1" id="form1">
              <table width="100%" height="301" border="0" cellpadding="0" cellspacing="0">

                <tr>
                  <td height="40">Item Name:</td>
                  <td><span id="sprytextfield1">
                      <label>
                        <input type="text" name="txtName" id="txtName" />
                      </label>
                      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
                <tr>
                  <td height="66">Description:</td>
                  <td><span id="sprytextarea1">
                      <label>
                        <textarea name="txtDesc" id="txtDesc" cols="35" rows="3"></textarea>
                      </label>
                      <span class="textareaRequiredMsg">A value is required.</span></span></td>
                </tr>
                <tr>
                  <td>Upload Image:</td>
                  <td><label>
                      <input type="file" name="txtFile" id="txtFile" />
                    </label></td>
                </tr>
                <tr>
                  <td>Size:</td>
                  <td><span id="sprytextfield2">
                      <label>
                        <input type="text" name="txtSize" id="txtSize" />
                      </label>
                      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
                <tr>
                  <td>Price:</td>
                  <td><span id="sprytextfield3">
                      <label>
                        <input type="text" name="txtPrice" id="txtPrice" />
                      </label>
                      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
                <tr>
                  <td>Discount:</td>
                  <td><span id="sprytextfield4">
                      <label>
                        <input type="text" name="txtDiscount" id="txtDiscount" />
                      </label>
                      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
                <tr>
                  <td>Final Price:</td>
                  <td><span id="sprytextfield5">
                      <label>
                        <input type="text" name="txtFinal" id="txtFinal" />
                      </label>
                      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><label>
                      <input type="submit" name="button" id="button" value="Submit" />
                    </label></td>
                </tr>
              </table>
            </form>
          </td>
        </tr>
        <tr>
          <td height="27" bgcolor="#003300">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;
            <table width="100%" border="1" cellpadding="2" cellspacing="2" bordercolor="#003300">
              <tr>
                <td bgcolor="#669900"><span class="style12">ItemId</span></td>
                <td bgcolor="#669900"><span class="style12">ItemName</span></td>
                <td bgcolor="#669900"><span class="style12">Size</span></td>
                <td bgcolor="#669900"><span class="style12">Image</span></td>
                <td bgcolor="#669900"><span class="style12">Price</span></td>
                <td bgcolor="#669900"><span class="style12">Discount</span></td>
                <td bgcolor="#669900"><span class="style12">Total</span></td>
              </tr>
              <?php if (mysqli_num_rows($Recordset2) > 0) {
                do { ?>
                  <tr>
                    <td>
                      <?php echo $row_Recordset2['ItemId']; ?>
                    </td>
                    <td>
                      <?php echo htmlspecialchars($row_Recordset2['ItemName']); ?>
                    </td>
                    <td>
                      <?php echo $row_Recordset2['Size']; ?>
                    </td>
                    <td><img src="../Products/<?php echo $row_Recordset2['Image']; ?>" height="125px" width="125px" /><br>
                    <a href="./View-image.php?filename=<?php echo $row_Recordset2['Image']; ?>">View Product</a>
                    </td>
                    <td>
                      <?php echo $row_Recordset2['Price']; ?>
                    </td>
                    <td>
                      <?php echo $row_Recordset2['Discount']; ?>
                    </td>
                    <td>
                      <?php echo $row_Recordset2['Total']; ?>
                    </td>
                  </tr>
                <?php } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
              } ?>
            </table>
          </td>
        </tr>
      </table>
      <p align="justify">&nbsp;</p>
      <table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <p><img src="img/Jeans.jpg" alt="box" width="100" height="100" hspace="10" align="left" class="imgleft"
                title="box" /></p>
          </td>
          <td>
            <p><img src="img/asd.jpg" alt="box" width="100" height="100" hspace="10" align="left" class="imgleft"
                title="box" /></p>
          </td>
          <td>
            <p><img src="img/images.jpg" alt="box" width="100" height="100" hspace="10" align="left" class="imgleft"
                title="box" /></p>
          </td>
        </tr>
        <tr>
          <td height="26" bgcolor="#BCE0A8">
            <div align="center" class="style9">Jeans</div>
          </td>
          <td bgcolor="#BCE0A8">
            <div align="center" class="style9">Bleasures</div>
          </td>
          <td bgcolor="#BCE0A8">
            <div align="center" class="style9">T-Shirts</div>
          </td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </div>
    <div id="right-col">
      <div class="scroll">
        <ul class="side">
          <?php
          $sql = "select * from Category_Master";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($result)) {
            $Id = $row['CategoryId'];
            $CategoryName = $row['CategoryName'];
            ?>
            <li><a href="Products.php?CategoryId=<?php echo $Id; ?>"><?php echo htmlspecialchars($CategoryName); ?></a></li>

            <?php
          }
          ?>
        </ul>
      </div>
      <ul class="side">
      </ul>
    </div>
    <div style="clear:both;"></div>
    <?php
    include "Footer.php";
    ?>
  </div>
</body>

</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

disconnect_db();
?>