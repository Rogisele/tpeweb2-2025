
<?php

<<<<<<< HEAD
=======

>>>>>>> 85e377fb6f6f34256474223ed6f6df8e3a19c421
    class GuardMiddleware {
        public function run($request) {
            if($request->user) {
                return $request;
            } else {
                header("Location: ".BASE_URL."login");
                exit();
            }
        }
    }

?>
