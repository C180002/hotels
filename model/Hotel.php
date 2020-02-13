<?php
    class Hotel
    {
        private $id = 0;
        private $name = '';
        private $price = 0;
        private $pref = '';
        private $city = '';
        private $address = '';
        private $memo = '';
        private $image = '';

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getPrice()
        {
            return $this->price;
        }

        public function setPrice($price)
        {
            $this->price = $price;
        }

        public function getPref()
        {
            return $this->pref;
        }

        public function setPref($pref)
        {
            $this->pref = $pref;
        }

        public function getCity()
        {
            return $this->city;
        }

        public function setCity($city)
        {
            $this->city = $city;
        }

        public function getAddress()
        {
            return $this->address;
        }

        public function setAddress($address)
        {
            $this->address = $address;
        }

        public function getMemo()
        {
            return $this->memo;
        }

        public function setMemo($memo)
        {
            $this->memo = $memo;
        }

        public function getImage()
        {
            return $this->image;
        }

        public function setImage($image)
        {
            $this->image = $image;
        }

        function __construct()
        {
            
        }

        // function __construct($id, $name, $price, $pref, $city, $address, $memo, $image)
        // {
        //     $this->id = $id;
        //     $this->name = $name;
        //     $this->price = $price;
        //     $this->pref = $pref;
        //     $this->city = $city;
        //     $this->address = $address;
        //     $this->memo = $memo;
        //     $this->image = $image;
        // }
    }
?>