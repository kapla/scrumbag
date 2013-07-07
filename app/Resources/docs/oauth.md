# Oauth in dev environment

In order to simplify oauth connection during developpment you can use `MmI4YjFhN2MwOTU4Yjc1MmQyYzk1M2ZiNDRhMTAwMzIwMzRkYmE5MzIzNmI3ZDE1ZDFjYjExY2UyMzEyNzc4OQ` as `access_token` in your requests. This is a token for the client Scrumbag for the admin user with an expiration date in 2016.

For exemple to test the Products:allAction, you can request for :

    http://scrumbag.dev/app_dev.php/api/products?access_token=MmI4YjFhN2MwOTU4Yjc1MmQyYzk1M2ZiNDRhMTAwMzIwMzRkYmE5MzIzNmI3ZDE1ZDFjYjExY2UyMzEyNzc4OQ

(don't forget to specify the `Accept` attribute in your request header)
