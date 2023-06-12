<?php

?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>ONLINE CLOTH SHOPPING</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <style type="text/css">
    <!--
    .style8 {
      font-size: 24px
    }

    .style9 {
      font-size: 95%;
      font-weight: bold;
      color: #003300;
      font-family: Verdana, Arial, Helvetica, sans-serif;
    }

    .style10 {
      color: #FFFFFF
    }
    -->
  </style>
</head>

<body>
  <div id="wrapper">

    <?php
    session_start();
    include "Header.php";
    ?>

    <div id="content">
      <h2><span style="color:#003300"> Welcome
          <?php echo $_SESSION['Name']; ?>
        </span></h2>
      <table width="100%" border="1" bordercolor="#003300">
        <tr>
          <td bgcolor="#4B692D" class="style10 style3"><strong>Item Name</strong></td>
          <td bgcolor="#4B692D" class="style10 style3"><strong>Quantity</strong></td>
          <td bgcolor="#4B692D" class="style10 style3"><strong>Price</strong></td>
          <td bgcolor="#4B692D" class="style10 style3"><strong>Size</strong></td>
          <td bgcolor="#4B692D" class="style10 style3"><strong>Total</strong></td>
          <td bgcolor="#4B692D" class="style10 style3"><strong>Image</strong></td>
        </tr>
        <?php


        require "../Connections/shop.php";
        connectDB();

        $sql = "SELECT shopping_cart_final.CustomerId, shopping_cart_final.ItemName, shopping_cart_final.Quantity, shopping_cart_final.Price, shopping_cart_final.Total, item_master.Image, item_master.`Size`
FROM shopping_cart_final, item_master
WHERE item_master.ItemName=shopping_cart_final.ItemName and shopping_cart_final.CustomerId=" . $_SESSION['ID'] . "";


        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
          $Id = $row['CustomerId'];

          $ItemName = $row['ItemName'];
          $Quantity = $row['Quantity'];
          $Price = $row['Price'];
          $Total = $row['Total'];
          $Size = $row['Size'];
          $Image = $row['Image'];

          ?>
          <tr>
            <td class="style3">
              <div align="left" class="style9 style5"><strong>
                  <?php echo $ItemName; ?>
                </strong></div>
            </td>
            <td class="style3">
              <div align="left" class="style9 style5"><strong>
                  <?php echo $Quantity; ?>
                </strong></div>
            </td>
            <td class="style3">
              <div align="left" class="style9 style5"><strong>
                  <?php echo $Price; ?>
                </strong></div>
            </td>
            <td class="style3">
              <div align="left" class="style9 style5"><strong>
                  <?php echo $Size; ?>
                </strong></div>
            </td>
            <td class="style3">
              <div align="left" class="style9 style5"><strong>
                  <?php echo $Total; ?>
                </strong></div>
            </td>
            <td class="style3"><img src="../Products/<?php echo $Image; ?>" height="125" width="125" /></td>
          </tr>
          <?php
        }

        $records = mysqli_num_rows($result);
        ?>
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
          disconnect_db();
          ?>
        </ul>
      </div>
      <ul class="side">
        <table width="100%" height="122" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td>
              <div align="center"><a href="checkout.php">Procced To Checkout</a></div>
            </td>
          </tr>
          <tr>
            <td>
              <div align="center"><img src="img/checkout.png" width="32" height="32" /></div>
            </td>
          </tr>
          <tr>
            <td>
              <div align="center"><a href="History.php">Order History</a></div>
            </td>
          </tr>
          <tr>
            <td>
              <div align="center"><img src="img/order.png" width="32" height="32" /></div>
            </td>
          </tr>
        </table>
      </ul>

    </div>
    <div style="clear:both;"></div>
    <?php
    include "Footer.php";
    ?>
  </div>
</body>

</html>