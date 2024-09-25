import './bootstrap';

import Alpine from 'alpinejs';

import ChatGlobal from './chat_global.js';
import PresenceList from './presence_list.js';
import Chat from './chat.js';
import Notifcation from './notification.js';

Alpine.data('chat_global', ChatGlobal);
Alpine.data('presence_list', PresenceList);
Alpine.data('chat', Chat);
Alpine.data('notification', Notifcation);

window.Alpine = Alpine;

Alpine.start();
