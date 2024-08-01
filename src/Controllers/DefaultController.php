<?php

namespace Wes\Mvc\Controllers;

use Wes\Mvc\Core\Controller;
use Wes\Mvc\Models\Products;

class DefaultController extends Controller
{
    public function index(): void
    {

        $data = [];

        $dbProducts = (new Products())->getAllAvailableProducts();

        foreach ($dbProducts as $product) {
            $productID = $product['id'];
            $userName = $product['product_name'];
            $description = $product['product_description'];
            $price = $product['product_price'];
            $picture = $product['product_image'];

            $data[] = [
                'id' => $productID,
                'name' => $userName,
                'description' => $description,
                'price' => $price,
                'picture' => $picture
            ];

        }


        $this->display('index', ['data' => $data]);
    }

    public function edit()
    {

        $id = $_REQUEST["id"];

        $dbProduct = (new Products())->getByID($id);

        if (!$dbProduct) {
            $this->display('404');
            return;
        }

        // Applying Business Rules
        $data = [
            'id' => $dbProduct['id'],
            'name' => $dbProduct['product_name'],
            'description' => $dbProduct['product_description'],
            'price' => $dbProduct['product_price'],
            'picture' => $dbProduct['product_image']
        ];

        $this->display('edit', ['data' => $data]);
    }

    /**
     * @throws \Exception
     */
    public function save(): bool
    {
        $postData = $_POST;

        try {
            $product = (new Peoduct())->getByID($postData['id']);

            if (!$product) {
                return false;
            }

            (new $product())->update($postData['id'], $postData);

            return true;

        } catch (\Exception $e) {
            error_log($e->getMessage());
            return false;
        }

    }
}