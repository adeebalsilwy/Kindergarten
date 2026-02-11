<?php

namespace App\View\Composers;

use App\Main\SideMenu;
use App\Main\SimpleMenu;
use App\Main\TopMenu;
use Illuminate\View\View;

class MenuComposer
{
    /**
     * Bind menu to the view.
     */
    public function compose(View $view): void
    {
        if (! is_null(request()->route())) {
            $layoutComposer = new LayoutComposer;
            $activeLayout = $layoutComposer->activeLayout($view);
            $activeTheme = session()->has('activeTheme') ? session('activeTheme') : 'rubick';

            $pageName = request()->route()->getName();
            $activeMenu = $this->activeMenu($pageName, $activeLayout);

            if ($activeLayout == 'top-menu') {
                $mainMenu = TopMenu::menu();
                if ($activeTheme === 'kindergarten' && isset($mainMenu['kindergarten'])) {
                    $mainMenu = ['kindergarten' => $mainMenu['kindergarten']];
                }
                $view->with('mainMenu', $mainMenu);
            }

            if ($activeLayout == 'side-menu') {
                $mainMenu = SideMenu::menu();
                if ($activeTheme === 'kindergarten' && isset($mainMenu['kindergarten'])) {
                    $mainMenu = ['kindergarten' => $mainMenu['kindergarten']];
                }
                $view->with('mainMenu', $mainMenu);
            }

            if ($activeLayout == 'simple-menu') {
                $mainMenu = SimpleMenu::menu();
                if ($activeTheme === 'kindergarten' && isset($mainMenu['kindergarten'])) {
                    $mainMenu = ['kindergarten' => $mainMenu['kindergarten']];
                }
                $view->with('mainMenu', $mainMenu);
            }

            $view->with('firstLevelActiveIndex', $activeMenu['first_level_active_index']);
            $view->with('secondLevelActiveIndex', $activeMenu['second_level_active_index']);
            $view->with('thirdLevelActiveIndex', $activeMenu['third_level_active_index']);

            $view->with('pageName', $pageName);
        }
    }

    /**
     * Set active menu & submenu.
     */
    public function activeMenu($pageName, $layout): array
    {
        $firstLevelActiveIndex = '';
        $secondLevelActiveIndex = '';
        $thirdLevelActiveIndex = '';

        if ($layout == 'top-menu') {
            foreach (TopMenu::menu() as $menuKey => $menu) {
                if (isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
                    $firstLevelActiveIndex = $menuKey;
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                        if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                            $firstLevelActiveIndex = $menuKey;
                            $secondLevelActiveIndex = $subMenuKey;
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                                if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                                    $firstLevelActiveIndex = $menuKey;
                                    $secondLevelActiveIndex = $subMenuKey;
                                    $thirdLevelActiveIndex = $lastSubMenuKey;
                                }
                            }
                        }
                    }
                }
            }
        } elseif ($layout == 'simple-menu') {
            foreach (SimpleMenu::menu() as $menuKey => $menu) {
                if ($menu !== 'divider' && isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
                    $firstLevelActiveIndex = $menuKey;
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                        if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                            $firstLevelActiveIndex = $menuKey;
                            $secondLevelActiveIndex = $subMenuKey;
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                                if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                                    $firstLevelActiveIndex = $menuKey;
                                    $secondLevelActiveIndex = $subMenuKey;
                                    $thirdLevelActiveIndex = $lastSubMenuKey;
                                }
                            }
                        }
                    }
                }
            }
        } else {
            foreach (SideMenu::menu() as $menuKey => $menu) {
                if ($menu !== 'divider' && isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
                    $firstLevelActiveIndex = $menuKey;
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                        if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                            $firstLevelActiveIndex = $menuKey;
                            $secondLevelActiveIndex = $subMenuKey;
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                                if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                                    $firstLevelActiveIndex = $menuKey;
                                    $secondLevelActiveIndex = $subMenuKey;
                                    $thirdLevelActiveIndex = $lastSubMenuKey;
                                }
                            }
                        }
                    }
                }
            }
        }

        return [
            'first_level_active_index' => $firstLevelActiveIndex,
            'second_level_active_index' => $secondLevelActiveIndex,
            'third_level_active_index' => $thirdLevelActiveIndex,
        ];
    }
}
