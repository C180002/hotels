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
                    // "  pref LIKE '%:Address%' ".
                    // "  pref LIKE ':AmbiguousPlace' ".
                    "  pref LIKE :AmbiguousPlace ".
                    // "    OR ".
                    // "  city LIKE '%:Address%' ".
                    // "    OR ".
                    // "  address LIKE '%:Address%' ".
                    "ORDER BY ".
                    "  id ASC ".
                    ";";

            // クエリー実行準備
            $pdo_stmn = $pdo->prepare($query);
            
            /* プレースホルダーに設定するパラメーターの連想配列を設定 */
            $param_a = [];

            // $param_a[":Address"] = $address;
            // $param_a[":AmbiguousPlace"] = "%".$address."%";
            $param_a[":AmbiguousPlace"] = "'%".$address."%'";
            
            // クエリー実行
            $pdo_stmn->execute($param_a);
            
            // 全ての結果行を含む配列を返戻
            $rs = $pdo_stmn->fetchAll();
            // $rs = $pdo_stmn->fetch();

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
