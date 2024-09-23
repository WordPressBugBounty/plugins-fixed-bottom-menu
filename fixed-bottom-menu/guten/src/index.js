import './index.scss';
import domReady from '@wordpress/dom-ready';
import { createRoot } from '@wordpress/element';
import FixedBottomMenuAdmin from './components/fixedbottommenuadmin';

domReady( () => {
    const root = createRoot(
        document.getElementById( 'fixed-bottom-menu-settings' )
    );

    root.render( <FixedBottomMenuAdmin /> );
} );
