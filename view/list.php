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
        $address = $_GET['address'];

        // $_SESSION['id'] = $id;
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
							<!-- <img src="../images/4.png" width="100" /> -->
							<img src="../images/<?= $htl->getImage() ?>" width="100" />
						</td>
						<td>
							<table class="detail">
								<tr>
									<td>
                    <!-- 西新宿ステーションホテル -->
                    <?= $htl->getName() ?>
                    <br />
                  </td>
								</tr>
								<tr>
									<td>
                    <!-- 東京都新宿区西新宿 11-11-11 -->
                    <?= $htl->getPref() ?><?= $htl->getCity() ?><?= $htl->getAddress() ?>
                  </td>
								</tr>
								<tr>
									<td>
                    <!-- 宿泊料：&yen;8,500 -->
                    宿泊料：&yen;<?= number_format($htl->getPrice()) ?>
                  </td>
								</tr>
								<tr>
									<td>
                    <!-- 最寄駅：新宿駅、西新宿駅から徒歩5分 -->
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
