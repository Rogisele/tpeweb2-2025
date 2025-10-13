<<<<<<< HEAD
<?php

    class SessionMiddleware {

        public function run($request){
            if(isset($_SESSION['USER_ID'])){
                $request->user = new StdClass();
                $request->user->id = $_SESSION['USER_ID'];
                $request->user->username = $_SESSION['USER_NAME'];   
            } else {
                $request->user = null;
            }
            return $request;
        }

    }
=======
<?php

    class SessionMiddleware {

        public function run($request){
            if(isset($_SESSION['USER_ID'])){
                $request->user = new StdClass();
                $request->user->id = $_SESSION['USER_ID'];
                $request->user->username = $_SESSION['USER_NAME'];   
            } else {
                $request->user = null;
            }
            return $request;
        }

    }
>>>>>>> 85e377fb6f6f34256474223ed6f6df8e3a19c421
