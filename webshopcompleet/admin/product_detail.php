<?php
include 'db.php';
include 'admin_header.php';


if(isset($_GET['opt']))
                    {
                        $opt = $_GET['opt'];
                    }
                    else
                    {
                        $opt = '';
                    }
                    switch($opt)
                    {
                      
                        case 'edit_post':
                            require_once('product_detail_edit.php');
                        break;
                      
                    }
                    ?>    