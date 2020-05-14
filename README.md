# Paynow Ecocash Payments Service

Accepting OneMoney payments through [paynow](https://paynow.co.zw) should not be a pain for the developer, that is why I created this API. This API attempts to ease out the integration with [paynow](https://paynow.co.zw) so that the developer can focus on the most important parts of the project. The API is very similar to the [EcoCash API](https://github.com/Berzel/paynow-ecocash-payments) but I have created them as seperate projects so that you can scale them independently depending on your requirements. If you wish however you can modify each service to accept both payment methods. Before using this service you must be registered with [paynow](https://paynow.co.zw) and have your ID and Key at the ready. Enjoy.

## Official Documentation

This service only has one endpoint `POST /v1/payments`. Here's the base URL `https://paynow-onemoney-payments.herokuapp.com`, you can also use it to discover the API on your own.

- `paynow_integration_id` : The ID of your integration as provided by Paynow. This field is required
- `paynow_integration_key` : Your Paynow integration key as provided by paynow. This field is required
- `customer_number` : The EcoCash phone number of the user you're charging in the format 071XXXXXXX. This field is required
- `amount` : The amount you're charging the user/customer. Example 700.98. This field is required
- `result_url` : For applications which listen for the pyanow update and don't poll for a result. This the url paynow will post to. This field is optional

Here's a screenshot for reference

![example postman screenshot](https://raw.githubusercontent.com/Berzel/paynow-onemoney-payments/master/docs/paynow.png)

That's all.
