{"changed":true,"filter":false,"title":"important_job_add.php","tooltip":"/important_job_add.php","value":"<html>\n</style>   \n    \n    <body>\n\n<h3> Add Important Jobs</h3>\n<form action=\"important_job_add.php\" method=\"post\">\n\nJob Name:<br>\n  <input type=\"text\" name=\"name\" required><br>\n\nJob Description:<br>\n  <input type=\"text\" name=\"description\"><br>\n<input type=\"submit\" value=\"Submit\" name= \"submit\"><br>\n\n</form>\n\n<?php\n// A simple web site in Cloud9 that runs through Apache\n// Press the 'Run' button on the top to start the web server,\n// then click the URL that is emitted to the Output tab of the console\n\nfunction submit()\n{\n    //connecting to MySQL\n    $link = mysqli_connect(\"localhost\", \"root\", \"\", \"TMS_DB\");\n\t\t\t\n    // Check connection\n    if($link === false)\n    {\n        die(\"ERROR: Could not connect. \" . mysqli_connect_error());\n    }\n   \n    $email   = $link->real_escape_string($_POST['email']);\n    $name    = $link->real_escape_string($_POST['name']);\n    $description = $link->real_escape_string($_POST['description']);\n    $link->query(\"CREATE TABLE IF NOT EXISTS imp_jobs(email VARCHAR(150) NOT NULL, name VARCHAR(100), description VARCHAR(250));\");\n    $query   = \"INSERT into imp_jobs (email,name,description) VALUES('\" . $email . \"','\" . $name . \"','\" . $description . \"')\";\n    $success = $link->query($query);\n\n    if (!$success)\n    {\n        die(\"Couldn't enter data: \".$link->error);\n\n    }\n\n    echo \"Thank You For Contacting Us <br>\";\n\n    $link->close();\n}\n\nif(isset($_POST['submit']))\n{\n   submit();\n} \n\n\n\t\t\t\n?>\n</body>\n\n</html>","undoManager":{"mark":91,"position":100,"stack":[[{"start":{"row":12,"column":33},"end":{"row":12,"column":34},"action":"remove","lines":["d"],"id":2307}],[{"start":{"row":12,"column":32},"end":{"row":12,"column":33},"action":"remove","lines":["r"],"id":2308}],[{"start":{"row":12,"column":31},"end":{"row":12,"column":32},"action":"remove","lines":["a"],"id":2309}],[{"start":{"row":12,"column":30},"end":{"row":12,"column":31},"action":"remove","lines":["w"],"id":2310}],[{"start":{"row":12,"column":30},"end":{"row":12,"column":31},"action":"insert","lines":["r"],"id":2311}],[{"start":{"row":12,"column":31},"end":{"row":12,"column":32},"action":"insert","lines":["w"],"id":2312}],[{"start":{"row":12,"column":32},"end":{"row":12,"column":33},"action":"insert","lines":["a"],"id":2313}],[{"start":{"row":12,"column":33},"end":{"row":12,"column":34},"action":"insert","lines":["r"],"id":2314}],[{"start":{"row":12,"column":34},"end":{"row":12,"column":35},"action":"insert","lines":["d"],"id":2315}],[{"start":{"row":12,"column":35},"end":{"row":12,"column":36},"action":"insert","lines":[" "],"id":2316}],[{"start":{"row":12,"column":36},"end":{"row":12,"column":37},"action":"insert","lines":["t"],"id":2317}],[{"start":{"row":12,"column":37},"end":{"row":12,"column":38},"action":"insert","lines":["o"],"id":2318}],[{"start":{"row":12,"column":38},"end":{"row":12,"column":39},"action":"insert","lines":[" "],"id":2319}],[{"start":{"row":12,"column":39},"end":{"row":12,"column":40},"action":"insert","lines":["S"],"id":2320}],[{"start":{"row":12,"column":40},"end":{"row":12,"column":41},"action":"insert","lines":["e"],"id":2321}],[{"start":{"row":12,"column":41},"end":{"row":12,"column":42},"action":"insert","lines":["c"],"id":2322}],[{"start":{"row":12,"column":42},"end":{"row":12,"column":43},"action":"insert","lines":["r"],"id":2323}],[{"start":{"row":12,"column":43},"end":{"row":12,"column":44},"action":"insert","lines":["e"],"id":2324}],[{"start":{"row":12,"column":44},"end":{"row":12,"column":45},"action":"insert","lines":["t"],"id":2325}],[{"start":{"row":12,"column":45},"end":{"row":12,"column":46},"action":"insert","lines":["a"],"id":2326}],[{"start":{"row":12,"column":46},"end":{"row":12,"column":47},"action":"insert","lines":["r"],"id":2327}],[{"start":{"row":12,"column":47},"end":{"row":12,"column":48},"action":"insert","lines":["y"],"id":2328}],[{"start":{"row":12,"column":48},"end":{"row":12,"column":49},"action":"insert","lines":[" "],"id":2329}],[{"start":{"row":12,"column":48},"end":{"row":12,"column":49},"action":"remove","lines":[" "],"id":2330}],[{"start":{"row":12,"column":48},"end":{"row":12,"column":49},"action":"remove","lines":[":"],"id":2331}],[{"start":{"row":12,"column":48},"end":{"row":12,"column":49},"action":"insert","lines":["?"],"id":2332}],[{"start":{"row":12,"column":26},"end":{"row":12,"column":27},"action":"remove","lines":["d"],"id":2333}],[{"start":{"row":12,"column":25},"end":{"row":12,"column":26},"action":"remove","lines":["i"],"id":2334}],[{"start":{"row":12,"column":24},"end":{"row":12,"column":25},"action":"remove","lines":["_"],"id":2335}],[{"start":{"row":12,"column":23},"end":{"row":12,"column":24},"action":"remove","lines":["l"],"id":2336}],[{"start":{"row":12,"column":22},"end":{"row":12,"column":23},"action":"remove","lines":["i"],"id":2337}],[{"start":{"row":12,"column":21},"end":{"row":12,"column":22},"action":"remove","lines":["a"],"id":2338}],[{"start":{"row":12,"column":20},"end":{"row":12,"column":21},"action":"remove","lines":["m"],"id":2339}],[{"start":{"row":12,"column":19},"end":{"row":12,"column":20},"action":"remove","lines":["e"],"id":2340}],[{"start":{"row":12,"column":19},"end":{"row":12,"column":20},"action":"insert","lines":["f"],"id":2341}],[{"start":{"row":12,"column":20},"end":{"row":12,"column":21},"action":"insert","lines":["l"],"id":2342}],[{"start":{"row":12,"column":21},"end":{"row":12,"column":22},"action":"insert","lines":["a"],"id":2343}],[{"start":{"row":12,"column":22},"end":{"row":12,"column":23},"action":"insert","lines":["g"],"id":2344}],[{"start":{"row":13,"column":19},"end":{"row":13,"column":20},"action":"remove","lines":["l"],"id":2345}],[{"start":{"row":13,"column":18},"end":{"row":13,"column":19},"action":"remove","lines":["i"],"id":2346}],[{"start":{"row":13,"column":17},"end":{"row":13,"column":18},"action":"remove","lines":["a"],"id":2347}],[{"start":{"row":13,"column":16},"end":{"row":13,"column":17},"action":"remove","lines":["m"],"id":2348}],[{"start":{"row":13,"column":15},"end":{"row":13,"column":16},"action":"remove","lines":["e"],"id":2349}],[{"start":{"row":13,"column":15},"end":{"row":13,"column":16},"action":"insert","lines":["c"],"id":2350}],[{"start":{"row":13,"column":16},"end":{"row":13,"column":17},"action":"insert","lines":["h"],"id":2351}],[{"start":{"row":13,"column":17},"end":{"row":13,"column":18},"action":"insert","lines":["e"],"id":2352}],[{"start":{"row":13,"column":18},"end":{"row":13,"column":19},"action":"insert","lines":["c"],"id":2353}],[{"start":{"row":13,"column":19},"end":{"row":13,"column":20},"action":"insert","lines":["k"],"id":2354}],[{"start":{"row":13,"column":20},"end":{"row":13,"column":21},"action":"insert","lines":["b"],"id":2355}],[{"start":{"row":13,"column":21},"end":{"row":13,"column":22},"action":"insert","lines":["o"],"id":2356}],[{"start":{"row":13,"column":22},"end":{"row":13,"column":23},"action":"insert","lines":["x"],"id":2357}],[{"start":{"row":13,"column":69},"end":{"row":13,"column":70},"action":"remove","lines":["d"],"id":2358}],[{"start":{"row":13,"column":68},"end":{"row":13,"column":69},"action":"remove","lines":["i"],"id":2359}],[{"start":{"row":13,"column":67},"end":{"row":13,"column":68},"action":"remove","lines":["_"],"id":2360}],[{"start":{"row":13,"column":66},"end":{"row":13,"column":67},"action":"remove","lines":["l"],"id":2361}],[{"start":{"row":13,"column":65},"end":{"row":13,"column":66},"action":"remove","lines":["i"],"id":2362}],[{"start":{"row":13,"column":64},"end":{"row":13,"column":65},"action":"remove","lines":["a"],"id":2363}],[{"start":{"row":13,"column":63},"end":{"row":13,"column":64},"action":"remove","lines":["m"],"id":2364}],[{"start":{"row":13,"column":62},"end":{"row":13,"column":63},"action":"remove","lines":["e"],"id":2365}],[{"start":{"row":13,"column":62},"end":{"row":13,"column":63},"action":"insert","lines":["f"],"id":2366}],[{"start":{"row":13,"column":63},"end":{"row":13,"column":64},"action":"insert","lines":["l"],"id":2367}],[{"start":{"row":13,"column":64},"end":{"row":13,"column":65},"action":"insert","lines":["a"],"id":2368}],[{"start":{"row":13,"column":65},"end":{"row":13,"column":66},"action":"insert","lines":["g"],"id":2369}],[{"start":{"row":0,"column":6},"end":{"row":1,"column":4},"action":"insert","lines":["","    "],"id":2370}],[{"start":{"row":1,"column":4},"end":{"row":2,"column":0},"action":"insert","lines":["",""],"id":2371},{"start":{"row":2,"column":0},"end":{"row":2,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":2,"column":4},"end":{"row":3,"column":0},"action":"insert","lines":["",""],"id":2372},{"start":{"row":3,"column":0},"end":{"row":3,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":1,"column":4},"end":{"row":2,"column":0},"action":"insert","lines":["",""],"id":2373},{"start":{"row":2,"column":0},"end":{"row":2,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":2,"column":4},"end":{"row":11,"column":11},"action":"insert","lines":["<style>","    #secretary_email_id","    {","        display:none;","    }","    #flag:checked ~ #secretary_email_id","    {","        display:block;","    }","</style>   "],"id":2374}],[{"start":{"row":3,"column":22},"end":{"row":3,"column":23},"action":"remove","lines":["d"],"id":2375}],[{"start":{"row":3,"column":21},"end":{"row":3,"column":22},"action":"remove","lines":["i"],"id":2376}],[{"start":{"row":3,"column":20},"end":{"row":3,"column":21},"action":"remove","lines":["_"],"id":2377}],[{"start":{"row":3,"column":19},"end":{"row":3,"column":20},"action":"remove","lines":["l"],"id":2378}],[{"start":{"row":3,"column":18},"end":{"row":3,"column":19},"action":"remove","lines":["i"],"id":2379}],[{"start":{"row":3,"column":17},"end":{"row":3,"column":18},"action":"remove","lines":["a"],"id":2380}],[{"start":{"row":3,"column":16},"end":{"row":3,"column":17},"action":"remove","lines":["m"],"id":2381}],[{"start":{"row":3,"column":15},"end":{"row":3,"column":16},"action":"remove","lines":["e"],"id":2382}],[{"start":{"row":3,"column":15},"end":{"row":3,"column":16},"action":"insert","lines":["f"],"id":2383}],[{"start":{"row":3,"column":16},"end":{"row":3,"column":17},"action":"insert","lines":["l"],"id":2384}],[{"start":{"row":3,"column":17},"end":{"row":3,"column":18},"action":"insert","lines":["a"],"id":2385}],[{"start":{"row":3,"column":18},"end":{"row":3,"column":19},"action":"insert","lines":["g"],"id":2386}],[{"start":{"row":7,"column":38},"end":{"row":7,"column":39},"action":"remove","lines":["d"],"id":2387}],[{"start":{"row":7,"column":37},"end":{"row":7,"column":38},"action":"remove","lines":["i"],"id":2388}],[{"start":{"row":7,"column":36},"end":{"row":7,"column":37},"action":"remove","lines":["_"],"id":2389}],[{"start":{"row":7,"column":35},"end":{"row":7,"column":36},"action":"remove","lines":["l"],"id":2390}],[{"start":{"row":7,"column":34},"end":{"row":7,"column":35},"action":"remove","lines":["i"],"id":2391}],[{"start":{"row":7,"column":33},"end":{"row":7,"column":34},"action":"remove","lines":["a"],"id":2392}],[{"start":{"row":7,"column":32},"end":{"row":7,"column":33},"action":"remove","lines":["m"],"id":2393}],[{"start":{"row":7,"column":31},"end":{"row":7,"column":32},"action":"remove","lines":["e"],"id":2394}],[{"start":{"row":7,"column":31},"end":{"row":7,"column":32},"action":"insert","lines":["f"],"id":2395}],[{"start":{"row":7,"column":32},"end":{"row":7,"column":33},"action":"insert","lines":["l"],"id":2396}],[{"start":{"row":7,"column":33},"end":{"row":7,"column":34},"action":"insert","lines":["a"],"id":2397}],[{"start":{"row":7,"column":34},"end":{"row":7,"column":35},"action":"insert","lines":["g"],"id":2398}],[{"start":{"row":2,"column":3},"end":{"row":10,"column":5},"action":"remove","lines":[" <style>","    #secretary_flag","    {","        display:none;","    }","    #flag:checked ~ #secretary_flag","    {","        display:block;","    }"],"id":2399}],[{"start":{"row":2,"column":2},"end":{"row":2,"column":3},"action":"remove","lines":[" "],"id":2400}],[{"start":{"row":2,"column":1},"end":{"row":2,"column":2},"action":"remove","lines":[" "],"id":2401}],[{"start":{"row":2,"column":0},"end":{"row":2,"column":1},"action":"remove","lines":[" "],"id":2402}],[{"start":{"row":1,"column":4},"end":{"row":2,"column":0},"action":"remove","lines":["",""],"id":2403}],[{"start":{"row":1,"column":0},"end":{"row":1,"column":4},"action":"remove","lines":["    "],"id":2404}],[{"start":{"row":0,"column":6},"end":{"row":1,"column":0},"action":"remove","lines":["",""],"id":2405}],[{"start":{"row":14,"column":0},"end":{"row":16,"column":72},"action":"remove","lines":["","<text id=secretary_flag>Forward to Secretary?</text><br>","  <input type=\"checkbox\" name=\"secretary_email\" id=\"secretary_flag\"><br>"],"id":2406}],[{"start":{"row":13,"column":55},"end":{"row":14,"column":0},"action":"remove","lines":["",""],"id":2407}]]},"ace":{"folds":[],"scrolltop":120,"scrollleft":0,"selection":{"start":{"row":13,"column":55},"end":{"row":13,"column":55},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":5,"state":"start","mode":"ace/mode/php"}},"timestamp":1491051293982}