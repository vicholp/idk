# Routers

Here you can register the routes that you application implements.

All classes should extend the `BaseRouter` class, and implements the `routes()` method.
There you can register routes using `get()` and `post()` methods.

Those classes must be registered in the `Router::register()` method.
