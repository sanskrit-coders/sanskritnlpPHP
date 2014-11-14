#!/bin/bash

#atleast 2 arguments are expected
if [ $# -lt 2 ]
then
  echo -e "Usage: ./convert.sh input_file output_file [websitename]\n \
      input_file  - input file or directory name\n \
      output_file - output file or directory name\n \
      websitename - tells the default font to use";
  exit 1;
fi

#input is not exist
if ! [ -a "${1}" ]
then
  echo "Error: ${1}: No such file or directory";
  exit 1;
fi

#input is a file
if ! [ -d "${1}" ]
then
  in="${1}";
  out="${2}";

  #ouput file name exists and is a directory
  if [ -d "${2}" ]
  then
    out="${2}/`basename \"$in\"`";
  fi
  if [ `echo "$in"|grep -io "\.htm[l]\?$"` ]
  then
    php -q cmd_convert.php5 $3 < "$in" > "$out";
  else
    echo "Error: Input file is not converted. Expecting .htm or .html extension";
    exit 1;
  fi
  exit 0;
fi

#ouput directory needs to be created
if ! [ -d "${2}" ]
then 
  mkdir -p "${2}";
  if [ `echo $?` -ne 0 ]
  then
    echo "Error: ${2}: Unable to create output directory";
    exit 1;
  fi
fi

#sed command is used to escape the white space character in the file name
#and remove the ./ from path
for i in `cd "${1}"; find ./|sed 's/ /$WS$/g'|sed 's/\.\///g'`
do
i=`echo $i|sed 's/\\$WS\\$/ /g'`;

in="${1}/$i";
out="${2}/$i";
if [ -d "$in" ]
then
  mkdir -p "$out";
elif [ `echo "$in"|grep -io "\.htm[l]\?$"` ]
then
  php -q cmd_convert.php5 $3 < "$in" > "$out";
else
  cp "$in" "$out";
fi
done
