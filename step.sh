#!/bin/bash

# Launching SGBD-bitrise step
echo "*************************"
echo "****** SGBD-bitrise *****"
echo "*************************"

# Testing the type of SGBD choosed
# SGBD_DB_TARGET have to be initialiaze en the step.yml file

if [[ ${SGBD_DB_TARGET} == "MYSQL" ]] 
    then
       echo "  > The SGBD target choosed : ${SGBD_DB_TARGET}"
       echo "  > Recovery Environment Variables..."
       echo "   - Timestamp ${ISO_DATETIME}"
       echo "   - BuildVersion : ${PJ_BUNDLE_VERSION}"
       echo "   - BuildNumber : ${PJ_BUNDLE_BUILD_NUMBER}"
       echo "   - Git branch : ${BITRISE_GIT_BRANCH}"
       echo " > Inserting data into database..."      
       php insert.php ${SGBD_DB_TARGET} ${PJ_BUNDLE_VERSION} ${PJ_BUNDLE_BUILD_NUMBER} ${BITRISE_GIT_BRANCH}
    else
       echo "There is no SGBD target choosed."
       exit 1
fi