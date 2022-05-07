#!/bin/bash
#
function ergodic(){
        for file in `ls $1`
        do
                if [ -d $1"/"$file ] && [ $file = "mobile" ]
                then
                         local path=$1"/"$file
                         du -h $path
                         for files in `ls $path | grep mobile`
                         do
                            rm $path"/"$files
                            echo $path"/"$files
                         done
                elif [ -d $1"/"$file ]
                then
                        ergodic $1"/"$file
                fi
        done
}
IFS=$'\n';
INIT_PATH="./1";

ergodic $INIT_PATH

