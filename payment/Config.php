<?php
namespace Thecodude;

class Config
{

    const CURRENCY = 'USD';

    const SELLER_ID = '901420224';

    const PUBLISHABLE_KEY = '9750A473-4578-4B63-842E-87097F5A05BD';

    const PRIVATE_KEY = '951A5216-AD4C-4A1D-951A-47DCFE71C876';

    public function productDetail()
    {
        $product = array(
            'AEL53DB' => array(
                "itemName" => 'Australian Email List ( 5.3K Data Budget $130 )',
                'itemPrice' => '130'
            ),
            'UKEC17B' => array(
                "itemName" => 'UK Based E-Commerce Companises Email List ( 1.7K Data Budget $45 )',
                'itemPrice' => '45'
            ),
            'USABC2K' => array(
                "itemName" => 'U.S.A Small Business Carpet Cleaning Email List ( 2K Data Budget $50 )',
                'itemPrice' => '50'
            ),
            'AHRE15D' => array(
                "itemName" => 'Asian Human Resource Email List ( 1.5K Data Budget $35 )',
                'itemPrice' => '35'
            ),
            'USACP05K' => array(
                "itemName" => 'U.S.A consumer product brands Email List ( 0.5K Data Budget $15 )',
                'itemPrice' => '15'
            ),
            'USFSB5K' => array(
                "itemName" => 'U.S.A Florida state Small business Owners Wirless, Landline & Website Number List ( 5.8K Data Budget $150 )',
                'itemPrice' => '150'
            ),
            'USTSB5K' => array(
                "itemName" => 'U.S.A Texas state Small business Owners Wirless Number List ( 5K Data Budget $150 )',
                'itemPrice' => '150'
            ),
            'DEPR50U' => array(
                "itemName" => 'Data Entry - Premium Package',
                'itemPrice' => '50'
            ),
            'DEST25U' => array(
                "itemName" => 'Data Entry - Standard Package',
                'itemPrice' => '25'
            ),
            'DEBS10U' => array(
                "itemName" => 'Data Entry - Basic Package',
                'itemPrice' => '10'
            ),
        );
        return $product;
    }

    public function monthArray()
    {
        $months = array(
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July ',
            'August',
            'September',
            'October',
            'November',
            'December'
        );
        return $months;
    }
}
