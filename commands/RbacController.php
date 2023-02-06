<?php

namespace app\commands;

use app\models\User;
use yii\console\Controller;

class RbacController extends Controller {
    public  function actionInit() {
        $auth = \Yii::$app->authManager;

        /*
         * creating roles
         */
        $buyer  = $auth->createRole('buyer');
        $manager  = $auth->createRole('manager');
        $admin  = $auth->createRole('admin');

        /*
         * creating permissions
         */
        $setManager = $auth->createPermission("setManager");
        $setManager->description = 'Allows admin to set managers';
        $auth->add($setManager);

        $create = $auth->createPermission('create');
        $create->description = 'Allows admin to create cities, products, categories, etc.';
        $auth->add($create);

        $update = $auth->createPermission('update');
        $update->description = 'Allows admin to update cities, products, categories, etc.';
        $auth->add($update);

        $delete = $auth->createPermission('delete');
        $delete->description = 'Allows admin to delete cities, products, categories, etc.';
        $auth->add($delete);


        $createOnlyOwn = $auth->createPermission('createOnlyOwn');
        $createOnlyOwn->description = 'Allows manager to create only  their managed company products';
        $auth->add($createOnlyOwn);

        $updateOnlyOwn = $auth->createPermission('updateOnlyOwn');
        $updateOnlyOwn->description = 'Allows manager to update only  their managed company products';
        $auth->add($updateOnlyOwn);

        $deleteOnlyOwn = $auth->createPermission('deleteOnlyOwn');
        $deleteOnlyOwn->description = 'Allows manager to delete only  their managed company products';
        $auth->add($deleteOnlyOwn);

        $viewAdminPage = $auth->createPermission('viewAdminPage');
        $viewAdminPage->description = 'Allows admin to view admin pages';
        $auth->add($viewAdminPage);

        /*
         * adding roles to db
         */
        $auth->add($admin);
        $auth->add($buyer);
        $auth->add($manager);

        /*
         * adding permissions to db
         */
        $auth->addChild($admin, $setManager);
        $auth->addChild($admin, $create);
        $auth->addChild($admin, $update);
        $auth->addChild($admin, $delete);
        $auth->addChild($admin, $viewAdminPage);

        $auth->addChild($manager, $createOnlyOwn);
        $auth->addChild($manager, $updateOnlyOwn);
        $auth->addChild($manager, $deleteOnlyOwn);

        echo 'Roles successfully generateted!';

        $adminUser = User::initAdminUser();

        $adminUser->save();

        $auth->assign($admin, $adminUser->getId());

        echo nl2br("\nAdmin user created! \nLogin - $adminUser->login, password - admin!");
    }
}
