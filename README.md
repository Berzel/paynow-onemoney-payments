# Paynow OneMoney Payments Service

Accepting OneMoney payments through [paynow](https://paynow.co.zw) should not be a pain for the developer, that is why I created this API. This API attempts to ease out the integration with [paynow](https://paynow.co.zw) so that the developer can focus on the most important parts of the project. The API is very similar to the EcoCash API but I have created them as seperate projects so that you can scale them independently depending on your requirements. If you wish however you can modify each service to accept both payment methods. Before using this service you must be registered with [paynow](https://paynow.co.zw) and have your ID and Key at the ready. Enjoy.

## Official Documentation

This service only has one endpoint `POST /v1/payments`. The sample API is hosted on Heroku at [`https://paynow-onemoney-payments.herokuapp.com`](https://paynow-onemoney-payments.herokuapp.com) and you can use it to test out the API before deploying the application in your own environment. When it comes time to deploy the application in your own environment you have one of the following options:

1. Deploying to Heroku. You can host the application yourself on heroku. For convinience you can use the following deploy to heroku button.

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

2. Using a docker image. `// TODO: Create a docker image for this app`

### API Documentation
The endpoint `POST /v1/payments` requires the following fields to work

- `customer_number` : The OneMoney phone number of the user you're charging in the format 0717777777. This field is required
- `amount` : The amount you're charging the user/customer. Example 700.98. This field is required
- `result_url` : For applications which listen for the pyanow update and don't poll for a result. This the url paynow will post to. This field is optional

Here's a screenshot for reference

![example postman screenshot](https://raw.githubusercontent.com/Berzel/paynow-ecocash-payments-service/master/docs/paynow-ecocash-payments.png)
