<?php
    /**
     *
     */
    class TestService
    {
        /**
         * @url         /test/:includeSiblings
         * @methods     GET,POST
         */
        public function sayHello(Request $req, Response $response)
        {
            $rex = new stdClass();
            $rex->name = "rex";
            $rex->age = 28;
            $rex->height = 1.87;
            $rex->male = true; // questionable
            $rex->dead = false; // questionable
            $rex->parents = array("Avril", "Norman");

            $robyn = new stdClass();
            $robyn->name = "robyn";
            $robyn->age = 28;
            $robyn->height = 1.47;
            $robyn->male = false; // questionable
            $robyn->dead = false; // questionable
            $robyn->parents = array("Avril", "Norman");

            if($req && isset($req->params["includeSiblings"]) && $req->params["includeSiblings"] == "true")
                $rex->siblings = array($robyn);

			$response->status = Status::OK;
			$response->headers['X-Powered-By'] = "Aerial REST";

            return $rex;
        }
    }
