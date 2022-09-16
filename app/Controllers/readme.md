# Controllers

Here you can define the controllers that your application implements.

All classes should extend `Controller`. Then, you can define as many function as you want, 
and you can use the functions `ok()`, and `json()` to format the response of your function.

Also, this is the best place to document you OpenApi. You will find an example inside `TemplateController`.

Remember to register those function inside a router.
