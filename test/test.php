<?php
session_start();

require_once("../model/product.php");
require_once("../BE/BUS/productBUS.php");

// 2
if (isset($_POST['search'])) {
    $columnName = array();
    $value = array();
    try {
        $gender = isset($_POST['gender']) ? $_POST['gender'] : null;

        if ($gender !== null) {
            $value[] = $gender;
            $columnName[] = 'gender';
        }

        $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : null;

        if ($category_id !== null) {
            $value[] = $category_id;
            $columnName[] = 'category_id';
        }

        $minPrice = isset($_POST['min_price']) ? $_POST['min_price'] : 0;
        $maxPrice = isset($_POST['max_price']) ? $_POST['max_price'] : 10000000;

        // create session
        $_SESSION['gender'] = $gender;
        $_SESSION['category_id'] = $category_id;
        $_SESSION['min_price'] = $minPrice;
        $_SESSION['max_price'] = $maxPrice;

        $listProduct = productBUS::getInstance()->searchProduct($gender, $category_id, $minPrice, $maxPrice);
        foreach ($listProduct as $product) {
            var_dump($product->__toString());
            echo "<br><br>";
        }
    } catch (InvalidArgumentException $e) {
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Test search</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <label>
            <input type="checkbox" id="gender-male" name="gender" value="male" <?php echo ($_SESSION['gender'] == 'male') ? 'checked' : ''; ?>> Nam
        </label>

        <label>
            <input type="checkbox" id="gender-female" name="gender" value="female" <?php echo ($_SESSION['gender'] == 'female') ? 'checked' : ''; ?>> Nữ
        </label>

        <label for="category">
            Category:
            <select id="category" name="category_id" multiple>
                <?php
                for ($i = 1; $i <= 9; $i++) {
                    echo "<option value='$i' " . ($_SESSION['category_id'] == $i ? 'selected' : '') . ">$i</option>";
                }
                ?>
            </select>
        </label>

        <label for="min-price">
            Min Price:
            <input type="number" id="min-price" name="min_price" value="<?php echo $_SESSION['min_price']; ?>">
        </label>
        <label for="max-price">
            Max Price:
            <input type="number" id="max-price" name="max_price" value="<?php echo $_SESSION['max_price']; ?>">
        </label>

        <button id="search" class="search" name="search">Search</button>
    </form>

    <script>
        var minPriceInput = document.getElementById('min-price');
        var maxPriceInput = document.getElementById('max-price');

        minPriceInput.addEventListener('input', function() {
            updatePriceDisplay();
        });

        maxPriceInput.addEventListener('input', function() {
            updatePriceDisplay();
        });

        function updatePriceDisplay() {
            minPriceDisplay.innerText = minPriceInput.value;
            maxPriceDisplay.innerText = maxPriceInput.value;
        }

        var genderMaleCheckbox = document.getElementById('gender-male');
        var genderFemaleCheckbox = document.getElementById('gender-female');

        genderMaleCheckbox.addEventListener('change', function() {
            updateGender();
        });

        genderFemaleCheckbox.addEventListener('change', function() {
            updateGender();
        });

        function updateGender() {
            if (genderMaleCheckbox.checked && genderFemaleCheckbox.checked) {
                // If both checkboxes are checked, uncheck the one that was clicked
                if (event.target === genderMaleCheckbox) {
                    genderFemaleCheckbox.checked = false;
                } else {
                    genderMaleCheckbox.checked = false;
                }
            }
        }
    </script>
</body>

</html>