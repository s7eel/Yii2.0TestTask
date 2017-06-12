<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 12.06.2017
 * Time: 6:50
 */
namespace app\components;

use yii\httpclient\Client;

class Amazon
{
    public static function getReqFromSite()
    {
        $client = new Client();
        $body = $client->createRequest()
            ->setMethod('get')
            ->setUrl('https://www.amazon.com/b/ref=s9_acss_bw_tt_x_slFDwatc_w?ie=UTF8&node=16634609011&sort=featured-rank&pf_rd_m=ATVPDKIKX0DER&pf_rd_s=merchandised-search-2&pf_rd_r=CYBQ8FM0A7NMXSRJ78G7&pf_rd_t=101&pf_rd_p=c89c70f5-be98-457d-bd07-d95dddba4a33&pf_rd_i=11411168011/')
            ->send();
        return $body;
    }

    public static function getItemsFromSite()
    {
        $pictures = array();
        $document = \phpQuery::newDocumentHTML(self::getReqFromSite());
        //         получаем список
        //        $div = $document->find('#mainResults');
        $div = $document->find('#mainResults .s-result-list .s-result-item');
        $i=0;
        foreach ($div as $item){
            $item = pq($item);
            $pictures[$i]['price'] = $item->find('.s-item-container .s-color-subdued .a-spacing-none .a-link-normal .a-size-small')->text();
            if($pictures[$i]['price']==NULL){
                continue;
            }
            $pictures[$i]['title'] = $item->find('.s-item-container .s-color-subdued .a-spacing-micro .a-link-normal h2')->text();
            $pictures[$i]['img'] = $item->find('.s-item-container .a-row .a-column .a-declarative .a-row a .s-card img')->attr('src');

            $i+=1;
        }
        return $pictures;
    }
}