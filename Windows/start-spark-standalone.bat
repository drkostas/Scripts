start for /f "tokens=5" %a in ('netstat -aon ^| find ":8081" ^| find "LISTENING"') do taskkill /f /pid %a
PING localhost -n 2 >NUL
start for /f "tokens=5" %a in ('netstat -aon ^| find ":8082" ^| find "LISTENING"') do taskkill /f /pid %a
PING localhost -n 2 >NUL
start for /f "tokens=5" %a in ('netstat -aon ^| find ":8083" ^| find "LISTENING"') do taskkill /f /pid %a
PING localhost -n 2 >NUL
start for /f "tokens=5" %a in ('netstat -aon ^| find ":8084" ^| find "LISTENING"') do taskkill /f /pid %a
PING localhost -n 2 >NUL
start C:\path\to\spark\bin\spark-class.cmd org.apache.spark.deploy.master.Master
PING localhost -n 6 >NUL
start C:\path\to\spark\bin\spark-class.cmd org.apache.spark.deploy.worker.Worker -c 2 -m 1g -p 8081 spark://localhost:7077
PING localhost -n 6 >NUL
start C:\path\to\spark\bin\spark-class.cmd org.apache.spark.deploy.worker.Worker -c 2 -m 1g -p 8082 spark://localhost:7077
PING localhost -n 6 >NUL
start C:\path\to\spark\bin\spark-class.cmd org.apache.spark.deploy.worker.Worker -c 2 -m 1g -p 8083 spark://localhost:7077
PING localhost -n 6 >NUL
start C:\path\to\spark\bin\spark-class.cmd org.apache.spark.deploy.worker.Worker -c 2 -m 1g -p 8084 spark://localhost:7077