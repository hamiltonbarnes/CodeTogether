#!/usr/bin/env sh
file=$1
rm $2/output.txt
rm $2/debug/runtime.txt
touch $2/output.txt
touch $2/debug/runtime.txt
touch $2/tempoutput.txt
chmod 777 $2/tempoutput.txt
chmod 777 $2/output.txt
chmod 777 $2/debug/runtime.txt
	

touch $2/temp.txt
touch $2/debug/errorplaceholder.txt
counter=1
if [ -s $2/input.txt ]
then
	#for c in $(cat $2/input.txt)
	#echo "\n" >> $2/input.txt
	while read c;
	do
		echo $c > $2/temp.txt
		echo "Result for Test Case $counter with input(s) : $c \n" >> $2/output.txt
		timeout 3s java -classpath $2 $file 0< $2/temp.txt 1> $2/tempoutput.txt 2> $2/debug/errorplaceholder.txt
		status=$?
		if [ "$status" = "124" ]
		then
			echo "EXECUTION TIMEOUT,IT TAKES MORE THAN 3S TO EXECUTE IT!\n" >> $2/output.txt
		else
			if [ -s $2/debug/errorplaceholder.txt ]
			then
				cat $2/debug/errorplaceholder.txt >> $2/debug/runtime.txt
				cat $2/debug/errorplaceholder.txt >> $2/output.txt
			else
				cat $2/tempoutput.txt >> $2/output.txt
			fi
		fi
		counter=$((counter+1))
	done < $2/input.txt
else
	echo "Result for Test Case : \n" >> $2/output.txt
	timeout 3s java -classpath $2 $file 1> $2/tempoutput.txt 2> $2/debug/errorplaceholder.txt
	status=$?
	if [ "$status" = "124" ]
	then
		echo "EXECUTION TIMEOUT,IT TAKES MORE THAN 3S TO EXECUTE IT!\n" >> $2/output.txt
	else
		if [ -s $2/debug/errorplaceholder.txt ]
		then
			cat $2/debug/errorplaceholder.txt >> $2/debug/runtime.txt
			cat $2/debug/errorplaceholder.txt >> $2/output.txt
		else
			cat $2/tempoutput.txt >> $2/output.txt
		fi
	fi
fi
rm $2/debug/errorplaceholder.txt
rm $2/temp.txt
#chown -R www-data:www-data $2
#chmod -R 777 $2