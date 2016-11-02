# SimpleMailChimp

SimpleMailchimp is a simplified wrapper for the "drewm mailchimp-api" it aims to further simplify basic MailChimp functionality.

## Installation
First, change your composer.json file to include the `rapidwebltd/simplemailchimp` package as shown below.

```json
{
    "require": {
       "rapidwebltd/simplemailchimp": "1.*"
    }
}
```
Then just run composer update to download/install SimpleMailChimp and create  relevant autoload files.

If your framework does not already do so, you must add require_once "vendor/autoload.php" to any files in which you wish to use SimpleMailChimp.

## Getting Started

In order to create the Object that will be used to communicate with the "drewm mailchimp-api" call the `getByAPIKey` function from the `SimpleMailChimpFactory` and pass it your API key.
```php
$simpleMailChimp = SimpleMailChimpFactory::getByAPIKey('API_KEY_GOES_HERE');
```

### Subscribing a user to a list

To subscribe a user to a list call the `subscribe` function and pass through the mailchimp list id and the users email.
```php
$simpleMailChimp->subscribe('LIST_ID_GOES_HERE', 'example@example.com');
```

If successful it will return an array containing the subscriber's data.

### Unsubscribing a user from a list

To unsubscribe a user from a list call the `unsubscribe` function and pass through the mailchimp list id and the users email.

```php
$simpleMailChimp->unsubscribe('LIST_ID_GOES_HERE', 'example@example.com');
```

If successful it will return an array containing the subscriber's data.

### Getting a subscribers details

To get the details of a specific subscriber from a list call the `getSubscriberDetails` function and pass through the mailchimp list id and the users email.

```php
$simpleMailChimp->getSubscriberDetails('LIST_ID_GOES_HERE', 'example@example.com');
```

If successful it will return an array containing the subscriber's data.

### Checking to see if a subscriber is already on a list and subscribed

To see if a subscriber is already on a list and is subscribed call the `isSubscribedToList` and pass through the mailchimp list id and the users email.

```php
$simpleMailChimp->isSubscribedToList('LIST_ID_GOES_HERE', 'example@example.com');
```

This function will return TRUE if the subscriber is found on the list AND is subscribed to it and return FALSE if either the user is not found on the list OR is in the list but set to unsubscribed.




