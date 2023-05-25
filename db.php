<?php
class Database
{
    private $host = "127.0.0.1";
    private $db_name = "stationshop";
    private $username = "root";
    private $password = "1234";
    public $conn;
    public $result;
    public $num_rows;
    public $sql;

    public function getConnection() //подключает датабазу
    {
        $this->conn = null; //состояние подключение = null по умолчанию
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);//подключаемся к дб которая висит на хосте.не получается - ругается
        } catch (Exception $exception) {
            echo "Error connection: " . $exception->getMessage();
        }
        return $this->conn;
    }
    public function runQuery($sql) //выполняет sql запрос по подключенной датабазе
    {
        try { //команда querry выполняет sql запрос
            $this->conn = $this->getConnection(); 
            $this->result = $this->conn->query($sql); //в result прилетает запрос выданный стандартным методом query который идет от переменной $sql в датабазу через conn.
            $this->num_rows = $this->result->num_rows;// получаем количество строк в запросе result через стандартное свойство num_r
        } catch (Exception $exception) {
            echo "Error executing query: " . $exception->getMessage();
        }
    }
    public function getRow($sql = '')//возвращает строку с sql запроса введенного через runQuery($sql) в виде ассоциативного массива
    {
        if (!$this->result || ($sql && $this->sql != $sql)) { //если нет нового запроса sql, работаем со старым
            $this->sql = $sql;
            $this->runQuery($sql); //туть
        }
        return $this->result->fetch_assoc(); // вывод ассоциативного массива через fetch_assoc()
    }

    public function getArray($sql = '') // возвращает массив ассоциативных массивов
    {
        if (!$this->result || ($sql && $this->sql != $sql)) { //если нет нового запроса sql, работаем со старым
            $this->sql = $sql;
            $this->runQuery($sql); 
        }
        if ($this->num_rows > 0) { //если есть строки в массиве, то вывести все строки массива 
            return $this->result->fetch_all(MYSQLI_ASSOC); // метод fetch_all() - вывести все строки массива 
        } else {
            return []; //выводим пустой массив если нет 
        }
    }
}
?>
