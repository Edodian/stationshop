<?php
class Product // класс product для работы с дб product
{
    private $name;
    public $id;
    private $price;
    private $discount;
    private $amount;
    private $url;
    public $research;

    public function __construct($id='') //конструктор в который прилетает айди товара
    {
        
        if ($id)
        {
            $this->id = $id;
            $this->getData();
        }
    }
    
    private function getData() 
    {
        $mysqli = new Database();//метод, в котором мы вытаскиваем данные по айди, полученном в конструкторе
        $sql = "SELECT * FROM product WHERE id=".$this->id;
        $mysqli->getConnection();
        $mysqli->runQuery($sql); //отправляем в дб запрос сверху
        if ($mysqli->num_rows == 1) //если в $mysqli есть строка - аккаунт существует, идем дальше
        {
            $this->research = $mysqli->getRow();
            //записываем в переменные класса данные полученные по ключам отдельных массивов, полученных через getRow() 
            $this->price = $this->research['price'];
            $this->name = $this->research['name'];
            $this->discount = $this->research['discount'];
            $this->amount = $this->research['amount'];
            $this->url = $this->research['url'];
        }
    }
    
    public function displayInput() //функция отображения ввода данных при создании нового товара
    {
        ?>
        <div style="margin-top:150px;margin-left:150px">
            <form action="add.php" method="POST" name='form' enctype="multipart/form-data">
                 <div>
                     <div>
                     <div>
                        <input type="number" id="id" name="id" hidden value="<?= $this->research['id'] ?>"/>

                    </div>
                    <div style="margin-bottom:15px">
                    <label for="name" style="font-size:23px">Set Name</label>
                    <input style="margin-left:10px" type="text" id="name" name="name" value="<?= $this->research['name'] ?>" />
                    </div>
                    
                    <div style="margin-bottom:15px">
                    <label for="price" style="font-size:23px">Set Price</label>
                     <input style="margin-left:10px" type="number"  id="price"  name="price" value="<?= $this->research['price'] ?>"  />
                    </div>

                    <div style="margin-bottom:15px">
                    <label for="discount" style="font-size:23px">Set Discount</label>
                     <input style="margin-left:10px" type="number"  id="discount"  name="discount" value="<?= $this->research['discount'] ?>" min='0' max='99' step ="0.01" />
                    </div>

                    <div style="margin-bottom:15px">
                    <label for="amount" style="font-size:23px">Set Amount</label>
                     <input style="margin-left:10px" type="number" id="amount" name="amount" value="<?= $this->research['amount'] ?>" />
                    </div>
                    <div id='product_IMG'>
            <?php
            if ($this->research['url'])
            {
            ?> 
                <img src="<?= $this->research['url'] ?>" height='100px' />
            <?php
            }
            ?>
                    </div>
                    <div style="margin-bottom:15px">
                     <label for="url" style="font-size:18px">Set Image (PNG, JPG)</label>
                     <input style="margin-left:10px" type="file" id="FILE" name="FILE" accept=".jpg, .jpeg, .png" multiple onclick="document.getElementById('product_IMG').hidden=true;" />   
                    </div>
                    <div>
                        <input style="width:90px;height:30px" type="submit" id="submit" name="Send" value="SAVE"/>
                    </div>
                </div>
            </form>
        </div>
<?php
    }
    
    public function saveData() // функция сохраняющая данные о продукте
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $amount = $_POST['amount'];
        $url = $_POST['url'];

        $mysqli = new Database();
        $mysqli->getConnection();
        
        // предполагается что тут уже есть конект с датабазой Assuming
        if ($_POST['id']) 
        {
            $sql = "UPDATE product set "; //если айди уже существует, то обновляем данные о продукте в ДБ 
        }
        else
        {
            $sql = "INSERT INTO product set "; //если айди еще нет, то вставляем в дб данные о продукте в ДБ, формируем запрос
        }
        foreach ($_POST as $k=> $val)
        {
            if ($k != 'id' and $k != 'Send') //если мы не изменяем айди, тк оно не может быть измененно и мы не изменяем параметры кнопки отправить, то:
            {
                $sql .= " $k ='$val', ";
            }
        }  
        $sql = mb_substr($sql,0,-2); //удаляем запятую и пробел в конце сфоримрованного запроса
        if ($_POST['id'])
        {
            $sql .= " where id=".$_POST['id'];
        }
      //  $sql = "(name, price, discount, amount, url) VALUES ('$name', $price, $discount, $amount, '$url')";
        $mysqli->runQuery($sql); // отправляем запрос 
    }
    public function deleteData() //функция удаляющая товар 
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$this->research['url'])) //проверка существует ли файл по картинке 
        { 
            unlink($_SERVER['DOCUMENT_ROOT'].$this->research['url']); //если да, то отсоединяем картинку
        }
        
       $mysqli = new Database(); //создаем класс дб
       $mysqli->getConnection(); // приесоединяемся к датабазе
       $mysqli->runQuery('delete from product where id='.$this->research['id']); //удаляем данные по айди товара по sql запросу через айди продукта
    }
    
    
    public function displayCard($attribute='') //функция отображения плиток с товаром 
    {
        ?>
    <div style="margin-left:3px;margin-right:3px " class="product_box">
    <a><img src="<?= $this->research['url'] ?>" height="160px" width="210px"/></a>
    <h3><?= $this->research['name'] ?></h3>
    <?php if ($this->research['discount']) { ?>
        <div style="display:flex;flex-direction: column">
            <p class="product_price"><?= round($this->research['price'] * (100 - $this->research['discount']) / 100, 2) ?> $</p>
            <p class="product_price"><s><?= $this->research['price'] ?> $</s></p>
        </div>
        <?php if ($attribute=="true"){ ?>
        <a onclick="window.open('add.php?id=<?= $this->research['id'] ?>', 'edit', 'left=200,top=100,height=400,width=600')" class="add_to_card">Change product</a>
        <a onclick="window.open('delete.php?id=<?= $this->research['id'] ?>', 'edit', 'left=200,top=100,height=100,width=100')" class="detail">Delete</a>
        <?php } ?>
    <?php }
     else { ?>
        <p style="justify-content:start;" class="product_price"><?= $this->research['price'] ?> $</p>
        <?php if ($attribute=="true"){ ?>
        <a style="margin-top:26.7px" onclick="window.open('add.php?id=<?= $this->research['id'] ?>', 'edit', 'left=200,top=100,height=400,width=600')" class="add_to_card">Change product</a>
        <a style="margin-top:26.7px" onclick="window.open('delete.php?id=<?= $this->research['id'] ?>', 'edit', 'left=200,top=100,height=100,width=100')" class="detail">Delete</a>
        <?php } ?>
    <?php } ?>
</div>

    <?php } 
} ?>
