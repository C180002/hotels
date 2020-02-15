<?php
    require_once('DatabaseProcess.php');
    require_once('../model/Hotel.php');

    class DataAcquisition
    {
        public function selectHotel($address)
        {
            // データベース処理インスタンス生成
            $dp = new DatabaseProcess();

            // データベース接続
            $pdo = $dp->connectDatabase();
            
            // クエリー組成
            $query = 
                    "SELECT ".
                    "  * ".
                    "FROM ".
                    "  hoteldb.hotels ".
                    "WHERE ".
                    "  pref LIKE :AmbiguousPlace ".
                    "    OR ".
                    "  city LIKE :AmbiguousPlace ".
                    "    OR ".
                    "  address LIKE :AmbiguousPlace ".
                    "ORDER BY ".
                    "  id ASC ".
                    ";";

            // 文を実行する準備を行って文オブジェクトを返戻
            $pdo_stmn = $pdo->prepare($query);
            
            // 値をパラメーターにバインド
            $pdo_stmn->bindValue(":AmbiguousPlace", "%".$address."%");
            
            // プリペアード・ステートメント実行
            $pdo_stmn->execute();
            
            // 全ての結果行を含む配列を返戻
            $rs = $pdo_stmn->fetchAll();

            // データベース切断
            $dp->disconnectDatabase($pdo);

            $htl_a = array();

            foreach ($rs as $r)
            {
                $id = $r["id"];
                $name = $r["name"];
                $price = $r["price"];
                $pref = $r["pref"];
                $city = $r["city"];
                $address = $r["address"];
                $memo = $r["memo"];
                $image = $r["image"];

                $htl = new Hotel();
                
                $htl->setId($id);
                $htl->setName($name);
                $htl->setPrice($price);
                $htl->setPref($pref);
                $htl->setCity($city);
                $htl->setAddress($address);
                $htl->setMemo($memo);
                $htl->setImage($image);

                $htl_a[] = $htl;
            }

            return $htl_a;
        }
    }
