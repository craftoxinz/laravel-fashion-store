import React from 'react';
import styles from './Footer.module.css';

export default function Footer() {
    const currentYear = new Date().getFullYear();

    return (
        <footer className={styles.footer}>
            <div className={styles.container}>
                <div className={styles.column}>
                    <a href="/" className={styles.logoLink}>
                        <img
                            src="/images/logo.png"
                            alt="GALFINC Logo"
                            className={styles.logoImage}
                        />
                    </a>
                    <p className={styles.tagline}>
                        Defining the modern biker aesthetic.
                    </p>
                </div>

                <div className={styles.column}>
                    <h4 className={styles.heading}>Shop</h4>
                    <ul className={styles.list}>
                        <li>
                            <a href="/shop/jackets">Jackets</a>
                        </li>
                        <li>
                            <a href="/shop/shirts">Shirts</a>
                        </li>
                        <li>
                            <a href="/shop/pants">Pants</a>
                        </li>
                    </ul>
                </div>

                <div className={styles.column}>
                    <h4 className={styles.heading}>Support</h4>
                    <ul className={styles.list}>
                        <li>
                            <a href="/faq">FAQ</a>
                        </li>
                        <li>
                            <a href="/shipping">Shipping</a>
                        </li>
                        <li>
                            <a href="/returns">Returns</a>
                        </li>
                    </ul>
                </div>

                <div className={styles.column}>
                    <h4 className={styles.heading}>Connect</h4>
                    <ul className={styles.list}>
                        <li>
                            <a
                                href="https://instagram.com/galfinc"
                                target="_blank"
                                rel="noreferrer"
                            >
                                Instagram
                            </a>
                        </li>
                        <li>
                            <a
                                href="https://tiktok.com/@galfinc"
                                target="_blank"
                                rel="noreferrer"
                            >
                                TikTok
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div className={styles.bottomBar}>
                <p>
                    &copy; {currentYear} Galfinc Official. Trademark Registered.
                    2025.
                </p>
            </div>
        </footer>
    );
}
