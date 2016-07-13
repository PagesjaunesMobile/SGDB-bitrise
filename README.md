# My Bitrise SGBD Step

My step insert data into a distant database.

## How to use this Step

Can be run directly with the [bitrise CLI](https://github.com/bitrise-io/bitrise),
just `git clone` this repository, `cd` into it's folder in your Terminal/Command Line
and call `bitrise run test`.

*Check the `bitrise.yml` file for required inputs which have to be
added to your `.bitrise.secrets.yml` file!*

## Compatibility

The step only support MYSQL today.

## Table structure

CREATE TABLE `bitrise_deploy` (
  `Id` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `BundleVersion` varchar(6) NOT NULL,
  `BundleBuild` varchar(12) NOT NULL,
  `GitBranch` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

## The paramameters of the step

SGBD_DB_TARGET {MYSQL}