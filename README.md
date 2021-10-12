# foresters-theme
This repository contains all the files to setup a wordpress theme called 'Foresters Theme'. The main purpose for this theme is to inform visitors about relevant information about the Foresters

## Setup

### Database
Since the repo is a wordpress theme, you'll need to run a local database. You can choose any you like, but I use [MAMP](https://www.mamp.info/en/downloads/)

### Development environment
The theme uses gulp to convert scss into css. Before you can use the gulpfile, you'll need to download all the npm packages. To do this, simply run `npm i` in the root of the repository. After downloading, run the gulpfile by executing `npm run start` in the root folder of the repository. After running the command, any scss will automatically converted to css and will be included in the website.

## Plugins
The theme uses the current plugins (plugin files not included in repository, ask the contributor for the .zip):

- Advanced Custom Fields Pro (required)

An export of the custom fields can be found in the root directory of the repository
