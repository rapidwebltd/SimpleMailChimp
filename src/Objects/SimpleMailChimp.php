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

    public function getAllUsersInList($listId)
    {
      $result = $this->client->get('lists/'.$listId.'/members/');

      return $result;
    }

}