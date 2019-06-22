<?php
$_base_url = 'http://localhost/CodeIgniter';
$__config = array(
    '_base_url' => $_base_url,
    'config' => 'config',
    'controllers' => 'controllers',
    'libraries' => 'libraries',
    'models' => 'models',
    'public' => 'public',
    'views' => 'views',
);
//cấu hình kết nối cơ sở dữ liệu
//host
define('DB_HOST', "localhost");
//user sử dụng
define('DB_USER', "root");
//mật khẩu
define('DB_PASSWORD', "");
//database sử dụng
define('DB_DATABASE', "dbnews");
//port: cổng mạng
define('DB_PORT', 3306);
//các biến tên folder
// file config.php cấu hình database để kết nối
//include ("../../config/config.php");
/*
 *  file tạo cấu trúc database và kết nối dữ liệu
 */
class Database
{
    /**
     * Khai báo biến kết nối
     * @var [type]
     */
    public $link = null;
    public function __construct()
    {
        // // $this->link = mysqli_connect("localhost", "root", "", "eshopv", 3308);
        // $this->link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);
        // mysqli_set_charset($this->link, "utf8");
        // if (mysqli_connect_error()) {
        //     die("Không thể kết nối: " . $link->connect_error);
        // } else {
        //     echo "kết nối thành công";
        // }
    }
    /**
     * hàm mở kết nối 
     */
    public function db_connect()
    {
        //kiểm tra biến $link (connect database) đã khởi tạo connect chưa
        if (!$this->link) {
            // $this->link = mysqli_connect("localhost", "root", "", "eshopv", 3308);
            $this->link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);
            mysqli_set_charset($this->link, "utf8");
            
            //xuất thông báo xem có kết nối được hay không?
            if (mysqli_connect_error()) {
                die("Không thể kết nối: " . mysqli_error($this->link));
            } else {
                // echo "kết nối thành công";
            }
        }
    }
    /**
     * hàm đóng kết nối 
     */
    public function db_close()
    {
        //nếu có mở kết nối thì đóng kết nối
        if ($this->link) {
            mysqli_close($this->link);
        }
    }
    /*
     * hàm thực thi câu truy vấn
     * $query: câu truy vấn cần thực thi
     */
    public function executeQuery($conn, $query)
    {
        //$this->db_connect();
        $result = mysqli_query($conn , $query) or die(" Lỗi Truy Vấn " .  mysqli_error($conn));
        //$this->db_close();
        return $result;
    }
    /**
     * [insert description] hàm insert 
     * @param  $table
     * @param  array  $data  
     * @return integer
     */
    public function insert($table, array $data)
    {
        //code
        $sql = "INSERT INTO {$table} ";
        $columns = implode(',', array_keys($data));
        $values = "";
        $sql .= '(' . $columns . ')';
        foreach ($data as $field => $value) {
            if (is_string($value)) {
                $values .= "'" . mysqli_real_escape_string($this->link, $value) . "',";
            } else {
                $values .= mysqli_real_escape_string($this->link, $value) . ',';
            }
        }
        $values = substr($values, 0, -1);
        $sql .= " VALUES (" . $values . ')';
        // _debug($sql);die;
        mysqli_query($this->link, $sql) or die("Lỗi  query  insert ----" . mysqli_error($this->link));
        return mysqli_insert_id($this->link);
    }
    public function update($table, array $data, array $conditions)
    {
        $sql = "UPDATE {$table}";
        $set = " SET ";
        $where = " WHERE ";
        foreach ($data as $field => $value) {
            if (is_string($value)) {
                $set .= $field . '=' . '\'' . mysqli_real_escape_string($this->link, xss_clean($value)) . '\',';
            } else {
                $set .= $field . '=' . mysqli_real_escape_string($this->link, xss_clean($value)) . ',';
            }
        }
        $set = substr($set, 0, -1);
        foreach ($conditions as $field => $value) {
            if (is_string($value)) {
                $where .= $field . '=' . '\'' . mysqli_real_escape_string($this->link, xss_clean($value)) . '\' AND ';
            } else {
                $where .= $field . '=' . mysqli_real_escape_string($this->link, xss_clean($value)) . ' AND ';
            }
        }
        $where = substr($where, 0, -5);
        $sql .= $set . $where;
        // _debug($sql);die;
        mysqli_query($this->link, $sql) or die("Lỗi truy vấn Update -- " . mysqli_error());
        return mysqli_affected_rows($this->link);
    }
    public function updateview($sql)
    {
        $result = mysqli_query($this->link, $sql) or die("Lỗi update view " . mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }
    public function countTable($table)
    {
        $sql = "SELECT id FROM  {$table}";
        $result = mysqli_query($this->link, $sql) or die("Lỗi Truy Vấn countTable----" . mysqli_error($this->link));
        $num = mysqli_num_rows($result);
        return $num;
    }
    /**
     * [delete description] hàm delete
     * @param  $table      [description]
     * @param  array  $conditions [description]
     * @return integer             [description]
     */
    public function delete($table, $id)
    {
        $sql = "DELETE FROM {$table} WHERE id = $id ";
        mysqli_query($this->link, $sql) or die(" Lỗi Truy Vấn delete   --- " . mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }
    /**
     * delete array 
     */
    public function deletewhere($table, $data = array())
    {
        foreach ($data as $id) {
            $id = intval($id);
            $sql = "DELETE FROM {$table} WHERE id = $id ";
            mysqli_query($this->link, $sql) or die(" Lỗi Truy Vấn delete   --- " . mysqli_error($this->link));
        }
        return true;
    }
    public function fetchsql($sql)
    {
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn sql " . mysqli_error($this->link));
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }
    public function fetchID($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE id = $id ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }
    public function fetchOne($table, $query)
    {
        $sql = "SELECT * FROM {$table} WHERE ";
        $sql .= $query;
        $sql .= "LIMIT 1";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchOne " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }
    public function deletesql($table, $sql)
    {
        $sql = "DELETE FROM {$table} WHERE " . $sql;
        // _debug($sql);die;
        mysqli_query($this->link, $sql) or die(" Lỗi Truy Vấn delete   --- " . mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }
    public function fetchAll($table)
    {
        $sql = "SELECT * FROM {$table} WHERE 1";
        $result = mysqli_query($this->link, $sql) or die("Lỗi Truy Vấn fetchAll " . mysqli_error($this->link));
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }
    public function fetchJones($table, $sql, $total = 1, $page, $row, $pagi = true)
    {
        $data = [];
        if ($pagi == true) {
            $sotrang = ceil($total / $row);
            $start = ($page - 1) * $row;
            $sql .= " LIMIT $start,$row ";
            $data = ["page" => $sotrang];
            $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));
        } else {
            $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));
        }
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }
    public function fetchJone($table, $sql, $page = 0, $row, $pagi = false)
    {
        $data = [];
        // _debug($sql);die;
        if ($pagi == true) {
            $total = $this->countTable($table);
            $sotrang = ceil($total / $row);
            $start = ($page - 1) * $row;
            $sql .= " LIMIT $start,$row";
            $data = ["page" => $sotrang];
            $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));
        } else {
            $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));
        }
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        // _debug($data);
        return $data;
    }
    public function fetchJoneDetail($table, $sql, $page = 0, $total, $pagi)
    {
        $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));
        $sotrang = ceil($total / $pagi);
        $start = ($page - 1) * $pagi;
        $sql .= " LIMIT $start,$pagi";
        $result = mysqli_query($this->link, $sql);
        $data = [];
        $data = ["page" => $sotrang];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }
    public function total($sql)
    {
        $result = mysqli_query($this->link, $sql);
        $tien = mysqli_fetch_assoc($result);
        return $tien;
    }
}
?>
