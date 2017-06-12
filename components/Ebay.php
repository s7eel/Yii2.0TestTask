<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 12.06.2017
 * Time: 6:40
 */
namespace app\components;

use yii\httpclient\Client;

class Ebay
{
    public static function getReqFromSite()
    {
        $client = new Client();
        $body = $client->createRequest()
            ->setMethod('get')
            ->setUrl('http://www.ebay.com/globaldeals')
            ->send();
        return $body;
    }

    public static function getItemsFromSite()
    {
        $pictures = array();
        $document = \phpQuery::newDocumentHTML(self::getReqFromSite());

        $div = $document->find('.ebayui-dne-item-featured-card .row .col');
        $i=0;
        foreach ($div as $item){
            $item = pq($item);
            $pictures[$i]['price'] = $item->find('.dne-itemtile a .dne-itemtile-detail .dne-itemtile-price .first')->text();
            if($pictures[$i]['price']==NULL){
                continue;
            }
            $pictures[$i]['img'] = $item->find('.dne-itemtile a img')->attr('src');
            $pictures[$i]['title'] = $item->find('.dne-itemtile a .dne-itemtile-detail h3')->text();
            $pictures[$i]['delivery'] = $item->find('.dne-itemtile a .dne-itemtile-detail .dne-itemtile-more-options')->text();
            if($pictures[$i]['delivery']=='' || $pictures[$i]['delivery']==NULL){
                $pictures[$i]['delivery'] = $item->find('.dne-itemtile a .dne-itemtile-detail .dne-itemtile-delivery')->text();
            }
            $i+=1;
        }
        return $pictures;
    }
}