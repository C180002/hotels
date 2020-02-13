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

    $da = new DataAcquisition();
    
    $hotel_a = $da->selectHotel();
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
          /* 繰り返し始まり */
					<tr>
						<td>
							<img src="../images/4.png" width="100" />
						</td>
						<td>
							<table class="detail">
								<tr>
									<td>
                    西新宿ステーションホテル
                    <br />
                  </td>
								</tr>
								<tr>
									<td>
                    東京都新宿区西新宿 11-11-11
                  </td>
								</tr>
								<tr>
									<td>
                    宿泊料：&yen;8,500
                  </td>
								</tr>
								<tr>
									<td>
                    最寄駅：新宿駅、西新宿駅から徒歩5分
                  </td>
								</tr>
							</table>
						</td>
          </tr>
          /* 繰り返し終わり */
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
