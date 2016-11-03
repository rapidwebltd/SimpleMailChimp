<?php
namespace RapidWeb\SimpleMailChimp\Objects;

class SimpleMailChimp
{
    private $client = null;

    public function __construct($client)
    {
        $this->client = $client;
    }

    private function subscriberHash($email)
    {
        return $this->client->subscriberHash($email);
    }

    public function subscribe($listId, $email)
    {
        $subscriberHash = $this->subscriberHash($email);

        $result = $this->client->put('lists/'.$listId.'/members/'.$subscriberHash, ['email_address' => $email, 'status' => 'subscribed']);

        return $result;
    }

    public function unsubscribe($listId, $email)
    {
        $subscriberHash = $this->subscriberHash($email);

        $result = $this->client->put('lists/'.$listId.'/members/'.$subscriberHash, ['email_address' => $email, 'status' => 'unsubscribed']);

        return $result;
    }

    public function getSubscriberDetails($listId, $email)
    {
        $subscriberHash = $this->subscriberHash($email);

        $result = $this->client->get('lists/'.$listId.'/members/'.$subscriberHash);

        return $result;
    }

    public function isSubscribedToList($listId, $email)
    {
        $result = $this->getSubscriberDetails($listId, $email);

        if ($result && isset($result['status']) && $result['status']=='subscribed') {
            return true;
        }

        return false;
    }

    public function getAllUsersInList($listId, $params = 'email_address')
    {
      $getListSize = $this->client->get('lists/'.$listId.'/members/');
      $listSize = $getListSize['total_items'];

      $count = 100;
      $pageCount =  $listSize / 100;
      $pageCount = ceil($pageCount);
      $i = 0;
      $result = array();
      $paramArray = explode(",",$params);
      $paramString = "";

      foreach($paramArray as $param)
      {
          $paramString .= "members.".$param.",";
      }

      $paramString = substr($paramString,0, -1);
      

      while($i <= $pageCount){
          if($i == 0){
             $getUsers = $this->client->get('lists/'.$listId.'/members/', ['count' => $count,'fields' => $paramString]); 
             foreach($getUsers['members'] as $member){
                 $result[] = $member;
             }
          }
          else{
              $offset = ($count * $i);
              $getUsers = $this->client->get('lists/'.$listId.'/members/', ['count' => $count,'offset' => $offset,'fields' => $paramString]);
              foreach($getUsers['members'] as $member){
                 $result[] = $member;
             }  
          }

        $i++;
      }

      return $result;
    }

}