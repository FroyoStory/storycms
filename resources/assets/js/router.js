import Home from './pages/home'
import { PostList, PostCreate, PostEdit } from './pages/post'
import { SettingGeneral } from './pages/settings'

export default {
  '/': { component: Home, name: 'Home' },
  'post': { component: PostList, name: 'PostList' },
  'post-create': { component: PostCreate, name: 'PostCreate' },
  'post-edit/:id': { component: PostEdit, name: 'PostEdit' },

  'settings-general': { component: SettingGeneral, name: 'SettingGeneral' }
}
