import React, { useState } from 'react';
import AppLayout from '../components/layout/AppLayout/AppLayout';
import Section from '../components/ui/section/Section';
import ProductCard from '../components/ui/productcard/ProductCard';
import styles from './shop.module.css';

// Mock data - eventually this comes from your backend friend
const allProducts = [
    {
        id: 1,
        name: 'Raw Denim Jacket',
        price: 'Rp 1.200.000,00',
        image: '/images/products/j1.jpg',
        category: 'Jackets',
    },
    {
        id: 2,
        name: 'Essential Tee',
        price: 'Rp 350.000,00',
        image: '/images/products/t1.jpg',
        category: 'Shirts',
    },
    {
        id: 3,
        name: 'Biker Cargo',
        price: 'Rp 850.000,00',
        image: '/images/products/p1.jpg',
        category: 'Pants',
    },
    {
        id: 4,
        name: 'Silver Ring',
        price: 'Rp 450.000,00',
        image: '/images/products/a1.jpg',
        category: 'Accessories',
    },
    {
        id: 5,
        name: 'Leather Boots',
        price: 'Rp 2.100.000,00',
        image: '/images/products/f1.jpg',
        category: 'Footwear',
    },
    {
        id: 6,
        name: 'Flannel Shirt',
        price: 'Rp 550.000,00',
        image: '/images/products/s1.jpg',
        category: 'Shirts',
    },
    {
        id: 7,
        name: 'Leather Jacket',
        price: 'Rp 3.500.000,00',
        image: '/images/products/j2.jpg',
        category: 'Jackets',
    },
    {
        id: 8,
        name: 'Ripped Denim',
        price: 'Rp 950.000,00',
        image: '/images/products/p2.jpg',
        category: 'Pants',
    },
];

export default function Shop() {
    const [activeCategory, setActiveCategory] = useState('All');

    return (
        <AppLayout activePage="shop">
            <Section id="shop-header">
                <div className={styles.header}>
                    <h1 className={styles.pageTitle}>Our Products</h1>
                    <div className={styles.sortContainer}>
                        <select className={styles.sortSelect}>
                            <option>Newest</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                        </select>
                    </div>
                </div>
            </Section>

            <Section id="shop-content" noPadding>
                <div className={styles.shopLayout}>
                    {/* SIDEBAR - Desktop Only */}
                    <aside className={styles.sidebar}>
                        <div className={styles.filterGroup}>
                            <h3 className={styles.filterLabel}>Categories</h3>
                            <ul className={styles.filterList}>
                                {[
                                    'All',
                                    'Jackets',
                                    'Shirts',
                                    'Pants',
                                    'Accessories',
                                ].map((cat) => (
                                    <li key={cat}>
                                        <button
                                            className={`${styles.filterBtn} ${activeCategory === cat ? styles.activeFilter : ''}`}
                                            onClick={() =>
                                                setActiveCategory(cat)
                                            }
                                        >
                                            {cat}
                                        </button>
                                    </li>
                                ))}
                            </ul>
                        </div>
                    </aside>

                    {/* MOBILE FILTER BAR - Visible only on Mobile */}
                    <div className={styles.mobileFilterBar}>
                        <button className={styles.mobileFilterToggle}>
                            Filter & Category
                        </button>
                    </div>

                    {/* PRODUCT GRID */}
                    <div className={styles.mainContent}>
                        <div className={styles.grid}>
                            {allProducts.map((product) => (
                                <ProductCard
                                    key={product.id}
                                    product={product}
                                />
                            ))}
                        </div>
                    </div>
                </div>
            </Section>
        </AppLayout>
    );
}
