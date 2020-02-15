<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>
      ホテル検索結果一覧
    </title>
		<link rel="stylesheet" href="../assets/css/style.css" />
		<link rel="stylesheet" href="../assets/css/hotels.css" />
  </head>
<?php
    require_once('../controller/DataAcquisition.php');
    
    if (isset($_GET['address']))
    {
        $address = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $_GET['address']);
    }

    $da = new DataAcquisition();
    
    $hotel_a = $da->selectHotel($address);
?>
	<body>
		<header>
			<h1>
        ホテル検索結果一覧
      </h1>
			<p>
        <a href="./entry.html">
          検索ページに戻る
        </a>
      </p>
		</header>
		<main>
			<article>
				<table>
<?php
    foreach ($hotel_a as $htl)
    {
?>
					<tr>
						<td>
							<img src="../images/<?= $htl->getImage() ?>" width="100" />
						</td>
						<td>
							<table class="detail">
								<tr>
									<td>
                    <?= $htl->getName() ?>
                    <br />
                  </td>
								</tr>
								<tr>
									<td>
                    <?= $htl->getPref() ?><?= $htl->getCity() ?><?= $htl->getAddress() ?>
                  </td>
								</tr>
								<tr>
									<td>
                    宿泊料：&yen;<?= number_format($htl->getPrice()) ?>
                  </td>
								</tr>
								<tr>
									<td>
                    <?= $htl->getMemo() ?>
                  </td>
								</tr>
							</table>
						</td>
          </tr>
<?php
    }
?>
				</table>
			</article>
		</main>
		<footer>
			<div id="copyright">
        (C) 2019 The Web System Development Course
      </div>
		</footer>
	</body>
</html>
